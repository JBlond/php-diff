<?php

namespace jblond\Diff\Renderer\Text;

use InvalidArgumentException;
use jblond\cli\CliColors;
use jblond\Diff\Renderer\MainRendererAbstract;

/**
 * Unified diff generator for PHP DiffLib.
 *
 * PHP version 7.3 or greater
 *
 * @package         jblond\Diff\Renderer\Text
 * @author          Mario Brandt <leet31337@web.de>
 * @copyright (c)   2020 Mario Brandt
 * @license         New BSD License http://www.opensource.org/licenses/bsd-license.php
 * @version         2.4.0
 * @link            https://github.com/JBlond/php-diff
 */
class UnifiedCli extends MainRendererAbstract
{
    /**
     * @var CliColors
     */
    private $colors;

    /**
     * @var array   Associative array containing the default options available for this renderer and their default
     *              value.
     */
    private $subOptions = [];

    /**
     * UnifiedCli constructor.
     *
     * @param   array  $options  Custom defined options for the UnifiedCli diff renderer.
     *
     */
    public function __construct(array $options = [])
    {
        parent::__construct();
        $this->setOptions($this->subOptions);
        $this->setOptions($options);
        $this->colors = new CliColors();
    }

    /**
     * Render and return a unified diff.
     *
     * @return string Direct Output to the console
     * @throws InvalidArgumentException
     */
    public function render(): string
    {
        return $this->output();
    }

    /**
     * Render and return a unified colored diff.
     *
     * @return string
     */
    private function output(): string
    {
        $diff    = '';
        $opCodes = $this->diff->getGroupedOpCodes();
        foreach ($opCodes as $key => $group) {
            if ($key % 2) {
                // Skip lines which are Out Of Context.
                continue;
            }
            $lastItem = array_key_last($group);
            $iGroup1       = $group[0][1];
            $iGroup2       = $group[$lastItem][2];
            $jGroup1       = $group[0][3];
            $jGroup2       = $group[$lastItem][4];

            if ($iGroup1 == 0 && $iGroup2 == 0) {
                $iGroup1 = -1;
                $iGroup2 = -1;
            }

            $diff .= $this->colorizeString(
                '@@ -' . ($iGroup1 + 1) . ',' . ($iGroup2 - $iGroup1) . ' +' . ($jGroup1 + 1)
                . ',' . ($jGroup2 - $jGroup1) . " @@\n",
                'purple'
            );

            foreach ($group as [$tag, $iGroup1, $iGroup2, $jGroup1, $jGroup2]) {
                if ($tag == 'equal') {
                    $string = implode(
                        "\n ",
                        $this->diff->getArrayRange($this->diff->getVersion1(), $iGroup1, $iGroup2)
                    );
                    $diff   .= $this->colorizeString(' ' . $string . "\n", 'grey');
                    continue;
                }
                if ($tag == 'replace' || $tag == 'delete') {
                    $string = implode(
                        "\n- ",
                        $this->diff->getArrayRange($this->diff->getVersion1(), $iGroup1, $iGroup2)
                    );
                    $diff   .= $this->colorizeString('-' . $string . "\n", 'light_red');
                }
                if ($tag == 'replace' || $tag == 'insert') {
                    $string = implode(
                        "\n+",
                        $this->diff->getArrayRange($this->diff->getVersion2(), $jGroup1, $jGroup2)
                    );
                    $diff   .= $this->colorizeString('+' . $string . "\n", 'light_green');
                }
            }
        }

        return $diff;
    }

    /**
     * @param   string  $string
     * @param   string  $color
     *
     * @return string
     */
    private function colorizeString(string $string, string $color = ''): string
    {
        if ($this->options['cliColor']) {
            return $this->colors->getColoredString($string, $color);
        }

        return $string;
    }
}
