<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Ribbon;

class RibbonTest extends TestCase
{
    public function testRibbonRendersBookmarkPlacement(): void
    {
        $html = Ribbon::widget([
            'text' => 'NEW',
            'color' => 'green',
            'placement' => 'top-end',
            'bookmark' => true,
        ]);

        $this->assertStringContainsString('ribbon', $html);
        $this->assertStringContainsString('ribbon-top', $html);
        $this->assertStringContainsString('ribbon-end', $html);
        $this->assertStringContainsString('ribbon-bookmark', $html);
        $this->assertStringContainsString('bg-green', $html);
        $this->assertStringContainsString('NEW', $html);
    }

    public function testRibbonShortcutUsesPresetColor(): void
    {
        $html = Ribbon::orange('BETA', placement: 'bottom-start');

        $this->assertStringContainsString('bg-orange', $html);
        $this->assertStringContainsString('ribbon-bottom', $html);
        $this->assertStringContainsString('ribbon-start', $html);
        $this->assertStringContainsString('BETA', $html);
    }

    public function testRibbonMakeSupportsDynamicColorSelection(): void
    {
        $html = Ribbon::make(color: 'red', text: 'LIVE', icon: 'bolt');

        $this->assertStringContainsString('bg-red', $html);
        $this->assertStringContainsString('LIVE', $html);
        $this->assertStringContainsString('ti-bolt', $html);
    }
}
