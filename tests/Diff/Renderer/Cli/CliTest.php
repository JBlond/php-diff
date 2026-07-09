<?php

namespace Tests\Diff\Renderer\Cli;

use PHPUnit\Framework\TestCase;
use jblond\Diff;

class CliTest extends TestCase
{
    public function testCliRendererWithColors(): void
    {
        $diff = new Diff("foo", "bar");
        $renderer = new Diff\Renderer\Text\UnifiedCli(['cliColor' => true]);
        $output = $diff->render($renderer);
        $this->assertStringContainsString("\033[", $output); // ANSI escape
    }
}
