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

    public function testInsertCase()
    {
        $a = "line1\nline2";
        $b = "line1\nline2\nline3";

        $diff = new Diff($a, $b);
        $output = $diff->render(new Merged());

        $this->assertStringContainsString('<ins', $output);
        $this->assertStringContainsString('line3', $output);
    }

    public function testDeleteCase()
    {
        $a = "line1\nline2\nline3";
        $b = "line1\nline3";

        $diff = new Diff($a, $b);
        $output = $diff->render(new Merged());

        $this->assertStringContainsString('ChangeDelete', $output);
        $this->assertStringContainsString('line2', $output);
    }

    public function testMixedChanges()
    {
        $a = "alpha\nbeta\ngamma\ndelta";
        $b = "alpha\nBETA\ngamma\nnew-delta";

        $diff = new Diff($a, $b);
        $output = $diff->render(new Merged());

        $this->assertStringContainsString('<del>beta</del>', $output);
        $this->assertStringContainsString('<ins>BETA</ins>', $output);
        $this->assertStringContainsString('<ins>new-</ins>', $output);
        $this->assertStringContainsString('delta', $output);
    }


    public function testReplaceCaseTriggersMergedBlock()
    {
        $a = "line1\nsame\nline3";
        $b = "line1\nchanged\nline3";

        $diff = new Diff($a, $b);
        $output = $diff->render(new Merged());

        // Hier sollte der Block ab Zeile 250 greifen:
        $this->assertStringContainsString('<del', $output);
        $this->assertStringContainsString('<ins', $output);
        $this->assertStringContainsString('same', $output);
        $this->assertStringContainsString('changed', $output);
    }
}
