<?php

declare(strict_types=1);

namespace Tests\Diff\Renderer\Html;

use jblond\Diff;
use jblond\Diff\Renderer\Html\HtmlArray;
use PHPUnit\Framework\TestCase;

/**
 * Class HtmlArrayTest
 * @package Tests\Diff\Renderer\Html
 */
class HtmlArrayTest extends TestCase
{

    /**
     * HtmlArrayTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        //new \jblond\Autoloader();
        parent::__construct($name, $data, $dataName);
    }

    /**
     *
     */
    public function testRenderSimpleDelete()
    {
        $htmlRenderer = new HtmlArray();
        $htmlRenderer->diff = new Diff(
            array('a'),
            array()
        );
        $result = $htmlRenderer->render();
        static::assertEquals(array(
            array(
                array(
                    'tag' => 'delete',
                    'base' => array(
                        'offset' => 0,
                        'lines' => array(
                            'a'
                        )
                    ),
                    'changed' => array(
                        'offset' => 0,
                        'lines' => array()
                    )
                )
            )
        ), $result);
    }

    /**
     *
     */
    public function testRenderFixesSpaces()
    {
        $htmlRenderer = new HtmlArray();
        $htmlRenderer->diff = new Diff(
            array('    a'),
            array('a')
        );
        $result = $htmlRenderer->render();
        static::assertEquals(array(
            array(
                array(
                    'tag' => 'replace',
                    'base' => array(
                        'offset' => 0,
                        'lines' => array(
                            "<del>&nbsp;&nbsp;&nbsp;&nbsp;</del>a",
                        )
                    ),
                    'changed' => array(
                        'offset' => 0,
                        'lines' => array(
                            '<ins></ins>a'
                        )
                    )
                )
            )
        ), $result);
    }
}
