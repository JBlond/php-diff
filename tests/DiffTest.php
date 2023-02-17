<?php

namespace Tests;

use InvalidArgumentException;
use jblond\Diff;
use jblond\Diff\Renderer\Html\SideBySide;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class DiffTest extends TestCase
{
    /**
     * @var Diff
     */
    protected $diff;

    /**
     * @param string|null $name
     * @param array $data
     * @param $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->diff = new Diff(
            file_get_contents('tests/resources/a.txt'),
            file_get_contents('tests/resources/b.txt')
        );
    }

    /**
     * @return void
     */
    public function testGetGroupedOpCodes()
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

    public function testGetVersion1()
    {
        $this->assertEquals(
            file('tests/resources/a.txt'),
            $this->diff->getVersion1()
        );
    }

    public function testGetVersion2()
    {
        $this->assertEquals(
            file('tests/resources/b.txt'),
            $this->diff->getVersion2()
        );
    }

    public function testGetArgumentType()
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

    public function testRender()
    {
        $renderer = new SideBySide();
        $this->assertEquals(
            file_get_contents('tests/resources/htmlSideBySide.txt'),
            $this->diff->render($renderer)
        );
    }

    public function testGetSimilarity()
    {
        $this->assertEquals(
            0.7272727272727273,
            $this->diff->getSimilarity()
        );
    }

    public function testIsIdentical()
    {
        $this->assertEquals(
            false,
            $this->diff->isIdentical()
        );
    }

    public function testGetStatistics()
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

    public function testGetArrayRange()
    {
        $this->assertEquals(
            [5,6],
            $this->diff->getArrayRange([2,5,6],1, 3)
        );

        $this->expectException(OutOfRangeException::class);
        $this->diff->getArrayRange([1,5],5);
    }
}
