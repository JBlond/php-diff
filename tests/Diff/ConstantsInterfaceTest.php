<?php

namespace Tests\Diff;

use jblond\Diff\ConstantsInterface;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ConstantsInterfaceTest extends TestCase
{
    /**
     * @return void
     */
    public function testConstants(): void
    {
        $constants = new \ReflectionClass(ConstantsInterface::class);
        $this->assertArrayHasKey('DIFF_IGNORE_LINE_NONE', $constants->getConstants());
        $this->assertArrayHasKey('DIFF_IGNORE_LINE_EMPTY', $constants->getConstants());
        $this->assertArrayHasKey('DIFF_IGNORE_LINE_NONE', $constants->getConstants());
    }
}
