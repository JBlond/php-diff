<?php

declare(strict_types=1);

namespace Tests\Diff;

use PHPUnit\Framework\TestCase;
use jblond\Diff;

class DiffOptionsTest extends TestCase
{
    public function testIgnoreWhitespace()
    {
        $diff = new Diff("Hello World", "Hello   World", ['ignoreWhitespace' => true]);
        $this->assertTrue($diff->isIdentical());
    }

    public function testIgnoreCase()
    {
        $diff = new Diff("Hello", "hello", ['ignoreCase' => true]);
        $this->assertTrue($diff->isIdentical());
    }

    public function testIgnoreLines()
    {
        $a = "line1\n// comment\nline2";
        $b = "line1\n// comment\nline2";

        $diff = new Diff($a, $b, ['ignoreLines' => ['// comment']]);

        $this->assertTrue($diff->isIdentical());
    }


    public function testContextOption()
    {
        $a = "A\nB\nC\nD";
        $b = "A\nX\nC\nD";
        $diff = new Diff($a, $b, ['context' => 0]);
        $this->assertFalse($diff->isIdentical());
    }
}
