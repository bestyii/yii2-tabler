<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Icon;

class IconTest extends TestCase
{
    public function testIconRendersTagAndClasses(): void
    {
        $html = Icon::widget([
            'name' => 'sparkles',
            'tag' => 'span',
        ]);

        $this->assertStringContainsString('<span', $html);
        $this->assertStringContainsString('ti', $html);
        $this->assertStringContainsString('ti-sparkles', $html);
    }

    public function testIconReturnsEmptyStringWithoutName(): void
    {
        $this->assertSame('', Icon::widget());
    }
}
