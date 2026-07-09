<?php

namespace Tests\Diff;

use jblond\Diff;
use jblond\Diff\Renderer\Text\Unified;
use jblond\Diff\Renderer\Html\SideBySide;
use jblond\Diff\Renderer\Text\Json;
use PHPUnit\Framework\TestCase;

class DiffTest extends TestCase
{
    public function testIdenticalStrings()
    {
        $diff = new Diff("Hello", "Hello");
        $this->assertTrue($diff->isIdentical());
        $this->assertFalse($diff->render(new Unified()));
    }

    public function testCompletelyDifferentStrings()
    {
        $diff = new Diff("A", "B");
        $output = $diff->render(new Unified());
        $this->assertStringContainsString("-A", $output);
        $this->assertStringContainsString("+B", $output);
    }

    public function testIgnoreWhitespace()
    {
        $options = ['ignoreWhitespace' => true];
        $diff = new Diff("Hello World", "Hello   World", $options);
        $this->assertTrue($diff->isIdentical());
    }

    public function testIgnoreCase()
    {
        $options = ['ignoreCase' => true];
        $diff = new Diff("Hello", "hello", $options);
        $this->assertTrue($diff->isIdentical());
    }

    public function testHtmlRendererOutput()
    {
        $diff = new Diff("foo", "bar");
        $output = $diff->render(new SideBySide());
        $this->assertStringContainsString("<table", $output);
        $this->assertStringContainsString("</table>", $output);
    }

    public function testJsonRendererOutput()
    {
        $diff = new Diff("foo", "bar");
        $output = $diff->render(new Json());
        $decoded = json_decode($output, true);

        $this->assertIsArray($decoded);
        $this->assertNotEmpty($decoded);
    }

    public function testEmptyInputs()
    {
        $diff = new Diff("", "");
        $this->assertTrue($diff->isIdentical());
    }
}
