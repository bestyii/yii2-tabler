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
}
