<?php

declare(strict_types=1);

namespace jblond\Diff\Renderer\Html;

use jblond\Diff\Renderer\MainRenderer;
use jblond\Diff\Renderer\SubRendererInterface;

/**
 * Side by Side HTML diff generator for PHP DiffLib.
 *
 * PHP version 7.3 or greater
 *
 * @package         jblond\Diff\Renderer\Html
 * @author          Chris Boulton <chris.boulton@interspire.com>
 * @author          Mario Brandt <leet31337@web.de>
 * @author          Ferry Cools <info@DigiLive.nl>
 * @copyright   (c) 2009 Chris Boulton
 * @license         New BSD License http://www.opensource.org/licenses/bsd-license.php
 * @version         2.4.0
 * @link            https://github.com/JBlond/php-diff
 */
class SideBySide extends MainRenderer implements SubRendererInterface
{
    /**
     * @var array   Associative array containing the default options available for this renderer and their default
     *              value.
     *              - format            The Format of the texts.
     *              - insertMarkers     Markers for inserted text.
     *              - deleteMarkers     Markers for removed text.
     *              - title1            Title of the 1st version of text.
     *              - title2            Title of the 2nd version of text.
     */
    private $subOptions = [
        'format'        => 'html',
        'insertMarkers' => ['<ins>', '</ins>'],
        'deleteMarkers' => ['<del>', '</del>'],
        'title1'        => 'Version1',
        'title2'        => 'Version2',
    ];

    /**
     * SideBySide constructor.
     *
     * @param   array  $options  Custom defined options for the SideBySide diff renderer.
     *
     * @see SideBySide::$subOptions
     */
    public function __construct(array $options = [])
    {
        parent::__construct($this->subOptions);
        $this->setOptions($options);
    }

    /**
     * @inheritDoc
     *
     * @return string|false The generated diff-view or false when there's no difference.
     */
    public function render()
    {
        $changes = parent::renderSequences();

        return parent::renderOutput($changes, $this);
    }

    /**
     * @inheritDoc
     *
     * @return string HTML code representation of a table's header.
     */
    public function generateDiffHeader(): string
    {
        return <<<HTML
<table class="Differences DifferencesSideBySide">
    <thead>
        <tr>
            <th colspan="2">{$this->options['title1']}</th>
            <th colspan="2">{$this->options['title2']}</th>
        </tr>
    </thead>
HTML;
    }

    /**
     * @inheritDoc
     *
     * @return string HTML code representing table rows showing text which is "Out Of Context"
     */
    public function generateLinesOutOfContext($change): string
    {
        return <<<HTML
<tr>
    <th>&hellip;</th>
    <td class="Left Skipped">&hellip;</td>
    <th>&hellip;</th>
    <td class="Right Skipped">&hellip;</td>
</tr>
HTML;
    }

    /**
     * @inheritDoc
     *
     * @return string HTML code representing table rows showing text with no difference.
     */
    public function generateLinesEqual(array $changes): string
    {
        $html = '';

        foreach ($changes['base']['lines'] as $lineNo => $baseLine) {
            $fromLine = $changes['base']['offset'] + $lineNo + 1;
            $toLine   = $changes['changed']['offset'] + $lineNo + 1;

            $html .= <<<HTML
<tr>
    <th>$fromLine</th>
    <td class="Left">
        <span>$baseLine</span>
    </td>
    <th>$toLine</th>
    <td class="Right">
        <span>{$changes['changed']['lines'][$lineNo]}</span>
    </td>
</tr>
HTML;
        }

        return $html;
    }

    /**
     * @inheritDoc
     *
     * @return string HTML code representing table rows showing with added text.
     */
    public function generateLinesInsert(array $changes): string
    {
        $html = '';

        foreach ($changes['changed']['lines'] as $lineNo => $line) {
            $toLine = $changes['changed']['offset'] + $lineNo + 1;

            $html .= <<<HTML
<tr>
    <th>&nbsp;</th>
    <td class="Left">&nbsp;</td>
    <th>$toLine</th>
    <td class="Right">
        <ins>$line</ins>
    </td>
</tr>
HTML;
        }

        return $html;
    }

    /**
     * @inheritDoc
     *
     * @return string HTML code representing table rows showing removed text.
     */
    public function generateLinesDelete(array $changes): string
    {
        $html = '';

        foreach ($changes['base']['lines'] as $lineNo => $line) {
            $fromLine = $changes['base']['offset'] + $lineNo + 1;

            $html .= <<<HTML
<tr>
    <th>$fromLine</th>
    <td class="Left">
        <del>$line</del>
    </td>
    <th>&nbsp;</th>
    <td class="Right">&nbsp;</td>
</tr>
HTML;
        }

        return $html;
    }

    /**
     * @inheritDoc
     *
     * @return string Html code representing table rows showing modified text.
     */
    public function generateLinesReplace(array $changes): string
    {
        $html = '';

        // Is below comparison result ever false?
        if (count($changes['base']['lines']) >= count($changes['changed']['lines'])) {
            foreach ($changes['base']['lines'] as $lineNo => $line) {
                $fromLine    = $changes['base']['offset'] + $lineNo + 1;
                $toLine      = '&nbsp;';
                $changedLine = '&nbsp;';
                if (isset($changes['changed']['lines'][$lineNo])) {
                    $toLine      = $changes['changed']['offset'] + $lineNo + 1;
                    $changedLine = $changes['changed']['lines'][$lineNo];
                }

                $line        = str_replace(["\0", "\1"], $this->options['deleteMarkers'], $line);
                $changedLine = str_replace(["\0", "\1"], $this->options['insertMarkers'], $changedLine);

                $html .= <<<HTML
<tr>
    <th>$fromLine</th>
    <td class="Left">
        <span>$line</span>
    </td>
    <th>$toLine</th>
    <td class="Right">
        <span>$changedLine</span>
    </td>
</tr>
HTML;
            }

            return $html;
        }

        foreach ($changes['changed']['lines'] as $lineNo => $changedLine) {
            $toLine   = $changes['changed']['offset'] + $lineNo + 1;
            $fromLine = '&nbsp;';
            $line     = '&nbsp;';
            if (isset($changes['base']['lines'][$lineNo])) {
                $fromLine = $changes['base']['offset'] + $lineNo + 1;
                $line     = $changes['base']['lines'][$lineNo];
            }

            $line        = str_replace(["\0", "\1"], $this->options['deleteMarkers'], $line);
            $changedLine = str_replace(["\0", "\1"], $this->options['insertMarkers'], $changedLine);

            $html .= <<<HTML
<tr>
    <th>$fromLine</th>
    <td class="Left">
        <span>$line</span>
    </td>
    <th>$toLine</th>
    <td class="Right">
        <span>$changedLine</span>
    </td>
</tr>
HTML;
        }

        return $html;
    }

    /**
     * @inheritDoc
     *
     * @return string Start of the block.
     */
    public function generateBlockHeader(array $changes): string
    {
        return '<tbody class="Change' . ucfirst($changes['tag']) . '">';
    }

    /**
     * @inheritDoc
     *
     * @return string End of the block.
     */
    public function generateBlockFooter(array $changes): string
    {
        return '</tbody>';
    }

    /**
     * @inheritDoc
     *
     * @return string End of the diff view.
     */
    public function generateDiffFooter(): string
    {
        return '</table>';
    }

    /**
     * @inheritDoc
     *
     * @return string Html code representing table rows showing ignored text.
     */
    public function generateLinesIgnore(array $changes): string
    {
        $html = '';

        // Is below comparison result ever false?
        if (count($changes['base']['lines']) >= count($changes['changed']['lines'])) {
            foreach ($changes['base']['lines'] as $lineNo => $line) {
                $fromLine    = $changes['base']['offset'] + $lineNo + 1;
                $toLine      = '&nbsp;';
                $changedLine = '&nbsp;';
                if (isset($changes['changed']['lines'][$lineNo])) {
                    $toLine      = $changes['changed']['offset'] + $lineNo + 1;
                    $changedLine = $changes['changed']['lines'][$lineNo];
                }

                $html .= <<<HTML
<tr>
    <th>$fromLine</th>
    <td class="Left">
        <span>$line</span>
    </td>
    <th>$toLine</th>
    <td class="Right Ignore">
        <span>$changedLine</span>
    </td>
</tr>
HTML;
            }

            return $html;
        }

        foreach ($changes['changed']['lines'] as $lineNo => $changedLine) {
            $toLine   = $changes['changed']['offset'] + $lineNo + 1;
            $fromLine = '&nbsp;';
            $line     = '&nbsp;';
            if (isset($changes['base']['lines'][$lineNo])) {
                $fromLine = $changes['base']['offset'] + $lineNo + 1;
                $line     = $changes['base']['lines'][$lineNo];
            }

            $line        = str_replace(["\0", "\1"], $this->options['deleteMarkers'], $line);
            $changedLine = str_replace(["\0", "\1"], $this->options['insertMarkers'], $changedLine);

            $html .= <<<HTML
<tr>
    <th>$fromLine</th>
    <td class="Left Ignore">
        <span>$line</span>
    </td>
    <th>$toLine</th>
    <td class="Right">
        <span>$changedLine</span>
    </td>
</tr>
HTML;
        }

        return $html;
    }
}
