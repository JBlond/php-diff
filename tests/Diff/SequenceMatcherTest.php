<?php

namespace Tests\Diff;

use jblond\Diff\SequenceMatcher;
use PHPUnit\Framework\TestCase;

/**
 * PHPUnit Test for the main renderer of PHP DiffLib.
 *
 * PHP version 7.2 or greater
 *
 * @package         Tests\Diff
 * @author          Mario Brandt <leet31337@web.de>
 * @author          Ferry Cools <info@DigiLive.nl>
 * @copyright   (c) 2009 Mario Brandt
 * @license         New BSD License http://www.opensource.org/licenses/bsd-license.php
 * @version         2.3.0
 * @link            https://github.com/JBlond/php-diff
 */
class SequenceMatcherTest extends TestCase
{
    /**
     * Test the opCodes of the differences between version1 and version2 with the default options.
     */
    public function testGetGroupedOpCodesDefault()
    {
        // Test with default options.
        $sequenceMatcher = new SequenceMatcher(
            '54321ABXDE12345',
            '54321ABxDE12345'
        );

        $this->assertEquals(
            [
                [
                    ['equal', 4, 7, 4, 7],
                    ['replace', 7, 8, 7, 8],
                    ['equal', 8, 11, 8, 11],
                ],
            ],
            $sequenceMatcher->getGroupedOpCodes()
        );
    }

    /**
     * Test the opCodes of the differences between version1 and version2 with option trimEqual disabled.
     */
    public function testGetGroupedOpCodesTrimEqualFalse()
    {
        // Test with trimEqual disabled.
        // First and last context lines of the sequences are included.
        $sequenceMatcher = new SequenceMatcher(
            '54321ABXDE12345',
            '54321ABxDE12345',
            ['trimEqual' => false]
        );

        $this->assertEquals(
            [
                [['equal', 0, 3, 0, 3]],
                [['equal', 4, 7, 4, 7], ['replace', 7, 8, 7, 8], ['equal', 8, 11, 8, 11]],
                [['equal', 12, 15, 12, 15]],
            ],
            $sequenceMatcher->getGroupedOpCodes()
        );
    }

    /**
     * Test the opCodes of the differences between version1 and version2 with option IgnoreWhitespace enabled.
     */
    public function testGetGroupedOpCodesIgnoreWhitespaceTrue()
    {
        // Test with ignoreWhitespace enabled. Both sequences are considered to be the same.
        // Note: The sequenceMatcher evaluates the string character by character. Option ignoreWhitespace will ignore
        //       if the difference if the character is a tab in one sequence and a space in the other.
        $sequenceMatcher = new SequenceMatcher(
            "\t54321ABXDE12345 ",
            " 54321ABXDE12345\t",
            ['ignoreWhitespace' => true]
        );

        $this->assertEquals([], $sequenceMatcher->getGroupedOpCodes());
    }

    /**
     *T est the opCodes of the differences between version1 and version2 with option ignoreCase enabled.
     */
    public function testGetGroupedOpCodesIgnoreCaseTrue()
    {
        // Test with ignoreCase enabled. Both sequences are considered to be the same.
        $sequenceMatcher = new SequenceMatcher(
            '54321ABXDE12345',
            '54321ABxDE12345',
            ['ignoreCase' => true]
        );

        $this->assertEquals([], $sequenceMatcher->getGroupedOpCodes());
    }
}
