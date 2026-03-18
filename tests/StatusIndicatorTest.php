<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\StatusIndicator;

class StatusIndicatorTest extends TestCase
{
    public function testStatusIndicatorRendersCirclesAndAnimatedState(): void
    {
        $html = StatusIndicator::widget([
            'color' => 'orange',
            'animated' => true,
        ]);

        $this->assertStringContainsString('status-indicator', $html);
        $this->assertStringContainsString('status-orange', $html);
        $this->assertStringContainsString('status-indicator-animated', $html);
        $this->assertSame(3, substr_count($html, 'status-indicator-circle'));
    }
}
