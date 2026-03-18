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
}
