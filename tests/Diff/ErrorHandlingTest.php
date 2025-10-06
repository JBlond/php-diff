<?php

namespace Tests\Diff;

use PHPUnit\Framework\TestCase;
use jblond\Diff;

class ErrorHandlingTest extends TestCase
{
    public function testInvalidRendererThrows()
    {
        $this->expectException(\TypeError::class);
        $diff = new Diff("foo", "bar");
        $diff->render("not-a-renderer");
    }
}
