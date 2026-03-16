<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\StatusDot;

/**
 * Tests for StatusDot widget
 */
class StatusDotTest extends TestCase
{
    public function testNormalStatusDot()
    {
        StatusDot::$counter = 0;
        $html = StatusDot::widget([
            'color' => 'warning',
        ]);

        $this->assertStringContainsString('<span id="w0" class="status-dot status-dot-warning"></span>', $html);
    }

    public function testAnimatedStatusDot()
    {
        StatusDot::$counter = 0;
        $html = StatusDot::widget([
            'color' => 'info',
            'animated' => true,
        ]);

        $this->assertStringContainsString('status-dot-animated', $html);
    }
}
