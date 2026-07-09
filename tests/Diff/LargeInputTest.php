<?php

namespace Tests\Diff;

use PHPUnit\Framework\TestCase;
use jblond\Diff;
use jblond\Diff\Renderer\Text\Unified;

class LargeInputTest extends TestCase
{
    public function testLargeInputDoesNotCrash(): void
    {
        $a = str_repeat("A\n", 2000);
        $b = str_repeat("B\n", 2000);
        $diff = new Diff($a, $b);
        $output = $diff->render(new Unified());
        $this->assertNotEmpty($output);
    }
}
