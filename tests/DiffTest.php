<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use jblond\Diff;
use jblond\Diff\Renderer\Html\SideBySide;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

/**
 * Class DiffTest
 *
 *
 * @package         Tests\Diff
 * @author          Mario Brandt <leet31337@web.de>
 * @copyright   (c) 2023 Mario Brandt
 * @license         New BSD License http://www.opensource.org/licenses/bsd-license.php
 * @version         2.4.0
 * @link            https://github.com/JBlond/php-diff
 */
class DiffTest extends TestCase
{
    /**
     * Store the Diff object
     * @var Diff
     */
    protected $diff;

    /**
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->diff = new Diff(
            file_get_contents('tests/resources/a.txt'),
            file_get_contents('tests/resources/b.txt')
        );
    }

    /**
     * Test the grouped OP codes
     * @return void
     */
    public function testGetGroupedOpCodes(): void
    {
        $this->assertEquals(
            [
                [
                    ['equal', 0, 3, 0, 3],
                    ['replace', 3, 4, 3, 4],
                    ['equal', 4, 7, 4, 7],
                    ['delete', 7, 8, 7, 7],
                    ['equal', 8, 9, 7, 8],
                    ['replace', 9, 10, 8, 9],
                    ['equal', 10, 11, 9, 10],
                    ['replace', 11, 12, 10, 11],
                    ['equal', 12,13, 11, 12],
                    ['insert', 13, 13, 12, 13],
                    ['equal', 13, 16, 13, 16],
                    ['replace', 16, 19, 16, 19],
                    ['equal', 19, 22, 19, 22],
                ],
                [
                    ['outOfContext', 22, 24, 22, 24],
                ],
                [
                    ['equal', 24, 27, 24, 27],
                    ['replace', 27, 28, 27, 28],
                    ['equal', 28, 29, 28, 29],
                    ['replace', 29, 30, 29, 30],
                    ['equal', 30, 33, 30, 33],
                ]
            ],
            $this->diff->getGroupedOpCodes()
        );
    }

    /**
     * Test the getter function
     * @return void
     */
    public function testGetVersion1(): void
    {
        $compareData = file('tests/resources/a.txt');
        $compareData = array_map(static function ($value) {
            return str_replace("\n", '', $value);
        }, $compareData);
        $compareData[] = "";
        $this->assertEquals(
            $compareData,
            $this->diff->getVersion1()
        );
    }

    /**
     * Test the getter function
     * @return void
     */
    public function testGetVersion2(): void
    {
        $compareData = file('tests/resources/b.txt');
        $compareData = array_map(static function ($value) {
            return str_replace("\n", '', $value);
        }, $compareData);
        $compareData[] = "";
        $this->assertEquals(
            $compareData,
            $this->diff->getVersion2()
        );
    }

    /**
     * Test the kind of variable.
     * @return void
     */
    public function testGetArgumentType(): void
    {
        $this->assertEquals(
            [
                0,
                1
            ],
            [
                $this->diff->getArgumentType([]),
                $this->diff->getArgumentType('ABC')
            ]
        );
        $this->expectException(InvalidArgumentException::class);
        $this->diff->getArgumentType(123);
    }

    /**
     * Test the rendering setter
     * @return void
     */
    public function testRender(): void
    {
        $renderer = new SideBySide();
        $this->assertStringEqualsFile(
            'tests/resources/htmlSideBySide.txt', $this->diff->render($renderer)
        );
    }

    /**
     * Test the similarity ratio of the two sequences
     * @return void
     */
    public function testGetSimilarity(): void
    {
        $this->assertEquals(
            0.7272727272727273,
            $this->diff->getSimilarity()
        );
    }

    /**
     * @return void
     */
    public function testIsIdentical(): void
    {
        $this->assertEquals(
            false,
            $this->diff->isIdentical()
        );
    }

    /**
     * @return void
     */
    public function testGetStatistics(): void
    {
        $this->assertEquals(
            [
                'inserted' => 1,
                'deleted' => 1,
                'replaced' => 8,
                'equal' => 24
            ],
            $this->diff->getStatistics()
        );
    }

    /**
     * @return void
     */
    public function testGetArrayRange(): void
    {
        $this->assertEquals(
            [5, 6],
            $this->diff->getArrayRange(
                [2, 5, 6],
                1,
                3
            )
        );

        $this->assertEquals(
            [2, 5, 6],
            $this->diff->getArrayRange(
                [2, 5, 6],
                0,
                3
            )
        );

        $this->assertEquals(
            [2, 5, 6],
            $this->diff->getArrayRange(
                [2, 5, 6],
                0,
                null
            )
        );

        $this->expectException(OutOfRangeException::class);
        $this->diff->getArrayRange(
            [1, 5],
            5
        );
    }
}
