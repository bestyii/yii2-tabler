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

    public function testStatusDotShortcutUsesPresetColor(): void
    {
        $html = StatusDot::red(animated: true);

        $this->assertStringContainsString('status-red', $html);
        $this->assertStringContainsString('bg-red', $html);
        $this->assertStringContainsString('status-dot-animated', $html);
    }

    public function testStatusDotMakeSupportsDynamicColorSelection(): void
    {
        $html = StatusDot::make(color: 'orange');

        $this->assertStringContainsString('status-orange', $html);
        $this->assertStringContainsString('bg-orange', $html);
    }
}
