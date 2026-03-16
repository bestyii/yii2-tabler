<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Status;

/**
 * Tests for Status widget
 */
class StatusTest extends TestCase
{
    public function testNormalStatus()
    {
        Status::$counter = 0;
        $html = Status::widget([
            'text' => 'Online',
            'color' => 'success',
        ]);

        $this->assertStringContainsString('<span id="w0" class="status status-success">', $html);
        $this->assertStringContainsString('<span class="status-dot"></span>', $html);
        $this->assertStringContainsString('Online', $html);
    }

    public function testAnimatedStatus()
    {
        Status::$counter = 0;
        $html = Status::widget([
            'text' => 'Blinking',
            'color' => 'danger',
            'animated' => true,
        ]);

        $this->assertStringContainsString('status-dot-animated', $html);
    }
}
