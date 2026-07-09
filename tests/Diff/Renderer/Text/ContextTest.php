<?php

declare(strict_types=1);

namespace Tests\Diff\Renderer\Text;

use jblond\Diff;
use jblond\Diff\Renderer\Text\Context;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function testContextRendererShowsContext()
    {
        $diff = new Diff("A\nB\nC", "A\nX\nC");
        $output = $diff->render(new Context());
        $this->assertStringContainsString("! B", $output);
        $this->assertStringContainsString("! X", $output);
    }
}
