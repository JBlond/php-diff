<?php

declare(strict_types=1);

namespace Tests\Diff\Renderer\Text;

use jblond\Diff;
use jblond\Diff\Renderer\Text\Unified;
use PHPUnit\Framework\TestCase;

class UnifiedTest extends TestCase
{
    public function testUnifiedRendererShowsChanges()
    {
        $diff = new Diff("foo", "bar");
        $output = $diff->render(new Unified());
        $this->assertStringContainsString("-foo", $output);
        $this->assertStringContainsString("+bar", $output);
    }
}
