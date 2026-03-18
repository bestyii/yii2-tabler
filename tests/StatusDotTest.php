<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\StatusDot;

class StatusDotTest extends TestCase
{
    public function testStatusDotRendersColorAndAnimatedState(): void
    {
        $html = StatusDot::widget([
            'color' => 'green',
            'animated' => true,
        ]);

        $this->assertStringContainsString('status-dot', $html);
        $this->assertStringContainsString('status-green', $html);
        $this->assertStringContainsString('bg-green', $html);
        $this->assertStringContainsString('status-dot-animated', $html);
    }
}
