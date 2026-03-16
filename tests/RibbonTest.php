<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Ribbon;

/**
 * Tests for Ribbon widget
 */
class RibbonTest extends TestCase
{
    public function testNormalRibbon()
    {
        Ribbon::$counter = 0;
        ob_start();
        Ribbon::begin([
            'text' => 'NEW',
            'color' => 'blue',
        ]);
        $html = ob_get_clean();

        $this->assertStringContainsString('class="ribbon bg-blue"', $html);
        $this->assertStringContainsString('NEW', $html);
    }

    public function testRibbonPositions()
    {
        Ribbon::$counter = 0;
        ob_start();
        Ribbon::begin([
            'text' => 'HOT',
            'position' => 'right',
        ]);
        $html = ob_get_clean();

        $this->assertStringContainsString('ribbon-right', $html);
    }
}
