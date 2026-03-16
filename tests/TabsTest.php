<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Tabs;

/**
 * Tests for Tabs widget
 */
class TabsTest extends TestCase
{
    public function testNormalTabs()
    {
        Tabs::$counter = 0;
        $html = Tabs::widget([
            'items' => [
                [
                    'label' => 'Tab 1',
                    'content' => 'Content 1',
                    'active' => true,
                ],
                [
                    'label' => 'Tab 2',
                    'content' => 'Content 2',
                ],
            ],
        ]);

        $this->assertStringContainsString('<ul id="w0" class="nav nav-tabs"', $html);
        $this->assertStringContainsString('Content 1', $html);
        $this->assertStringContainsString('Content 2', $html);
    }
}
