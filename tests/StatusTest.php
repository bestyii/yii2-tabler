<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Status;

class StatusTest extends TestCase
{
    public function testStatusRendersDotColorAndText(): void
    {
        $html = Status::widget([
            'text' => 'Ready',
            'color' => 'green',
        ]);

        $this->assertStringContainsString('status status-green', $html);
        $this->assertStringContainsString('status-dot bg-green', $html);
        $this->assertStringContainsString('status-text', $html);
        $this->assertStringContainsString('Ready', $html);
    }

    public function testStatusShortcutUsesPresetColor(): void
    {
        $html = Status::green('Ready');

        $this->assertStringContainsString('status-green', $html);
        $this->assertStringContainsString('status-dot bg-green', $html);
    }

    public function testStatusMakeSupportsDynamicColorSelection(): void
    {
        $html = Status::make(color: 'orange', text: 'Queued', showDot: false);

        $this->assertStringContainsString('status-orange', $html);
        $this->assertStringContainsString('Queued', $html);
        $this->assertStringNotContainsString('status-dot', $html);
    }
}
