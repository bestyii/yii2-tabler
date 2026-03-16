<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Divider;

/**
 * Tests for Divider widget
 */
class DividerTest extends TestCase
{
    public function testNormalDivider()
    {
        Divider::$counter = 0;
        $html = Divider::widget();

        $this->assertEquals('<div id="w0" class="hr"></div>', $html);
    }

    public function testDividerWithText()
    {
        Divider::$counter = 0;
        $html = Divider::widget([
            'text' => 'Divider Text',
        ]);

        $this->assertStringContainsString('hr-text', $html);
        $this->assertStringContainsString('Divider Text', $html);
    }

    public function testVerticalDivider()
    {
        Divider::$counter = 0;
        $html = Divider::widget([
            'vertical' => true,
        ]);

        $this->assertStringContainsString('hr-vertical', $html);
    }
}
