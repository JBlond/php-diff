<?php

declare(strict_types=1);

namespace Tests\Diff\Renderer\Html;

use jblond\Diff;
use jblond\Diff\Renderer\Html\SideBySide;
use PHPUnit\Framework\TestCase;

class SideBySideTest extends TestCase
{
    public function testSideBySideRendererProducesTable()
    {
        $diff = new Diff("foo", "bar");
        $output = $diff->render(new SideBySide());
        $this->assertStringContainsString("<table", $output);
        $this->assertStringContainsString("</table>", $output);
    }
}
