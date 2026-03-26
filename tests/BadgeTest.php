<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Badge;

class BadgeTest extends TestCase
{
    public function testBadgeRendersEncodedTextAndColorClass(): void
    {
        $html = Badge::widget([
            'text' => '<Ready>',
            'color' => 'green',
            'lite' => true,
        ]);

        $this->assertStringContainsString('badge', $html);
        $this->assertStringContainsString('bg-green-lt', $html);
        $this->assertStringContainsString('&lt;Ready&gt;', $html);
    }

    public function testBadgeShortcutUsesNamedColorVariant(): void
    {
        $html = Badge::secondary('Draft', lite: true, options: [
            'class' => 'ms-2',
        ]);

        $this->assertStringContainsString('badge', $html);
        $this->assertStringContainsString('bg-secondary-lt', $html);
        $this->assertStringContainsString('ms-2', $html);
        $this->assertStringContainsString('Draft', $html);
    }

    public function testBadgeMakeSupportsDynamicColorSelection(): void
    {
        $html = Badge::make(color: 'orange', text: 'Queue', lite: true);

        $this->assertStringContainsString('bg-orange-lt', $html);
        $this->assertStringContainsString('Queue', $html);
    }
}
