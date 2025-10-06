<?php

declare(strict_types=1);

namespace Tests\Diff\Renderer\Html;

use jblond\Diff;
use jblond\Diff\Renderer\Html\Merged;
use PHPUnit\Framework\TestCase;

class MergedTest extends TestCase
{
    public function testMergedRendererReplaceCase()
    {
        $a = "line1\nsame\nline3";
        $b = "line1\nchanged\nline3";

        $diff = new Diff($a, $b);
        $output = $diff->render(new Merged());

        $this->assertStringContainsString('<del', $output);
        $this->assertStringContainsString('<ins', $output);
    }
}
