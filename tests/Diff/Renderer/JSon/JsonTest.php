<?php

declare(strict_types=1);

namespace Tests\Diff\Renderer\Text;

use PHPUnit\Framework\TestCase;
use jblond\Diff;
use jblond\Diff\Renderer\Text\Json;

class JsonTest extends TestCase
{
    public function testJsonRendererProducesValidJson()
    {
        $diff = new Diff("foo", "bar");
        $output = $diff->render(new Json());
        $decoded = json_decode($output, true);

        $this->assertIsArray($decoded);
        $this->assertNotEmpty($decoded);
        $this->assertIsArray($decoded[0]);
    }
}
