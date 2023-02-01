<?php

namespace jblond\Diff\Renderer\Text;

use jblond\Diff\Renderer\MainRendererAbstract;

/**
 * Unified diff generator for PHP DiffLib.
 *
 * PHP version 7.3 or greater
 *
 * @package         jblond\Diff\Renderer\Text
 * @author          Mario Brandt <leet31337@web.de>
 * @copyright   (c) 2023 Mario Brandt
 * @license         New BSD License http://www.opensource.org/licenses/bsd-license.php
 * @version         2.4.0
 * @link            https://github.com/JBlond/php-diff
 */

/**
 * Class Diff_Renderer_Text_Json
 */
class Json extends MainRendererAbstract
{
    /**
     * @var array   Associative array containing the default options available for this renderer and their default
     *              value.
     */
    private $subOptions = [
        'json' => JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    ];

    /**
     * InlineCli constructor.
     *
     * @param   array  $options  Custom defined options for the InlineCli diff renderer.
     *
     * @see Json::$subOptions
     */
    public function __construct(array $options = [])
    {
        parent::__construct($this->subOptions);
        $this->setOptions($options);
    }

    /**
     * @return false|string
     */
    public function render()
    {
        $return = [];
        $opCodes = $this->diff->getGroupedOpCodes();

        foreach ($opCodes as $key => $group) {
            $return[] = $this->toArray($group);
        }
        return json_encode($return, $this->options['json']);
    }

    /**
     * @param $group
     * @return array
     */
    protected function toArray($group): array
    {
        $return = [];
        foreach ($group as [$tag, $iGroup1, $iGroup2, $jGroup1, $jGroup2]) {
            $return[] = [
                'tag' => $tag,
                'old' => [
                    'offset' => $iGroup1,
                    'lines' => $this->diff->getArrayRange($this->diff->getVersion1(), $iGroup1, $iGroup2)
                ],
                'new' => [
                    'offset' => $jGroup1,
                    'lines' => $this->diff->getArrayRange($this->diff->getVersion2(), $jGroup1, $jGroup2)
                ],
            ];
        }
        return $return;
    }
}
