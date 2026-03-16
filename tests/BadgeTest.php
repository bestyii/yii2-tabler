<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Badge;

/**
 * Tests for Badge widget
 */
class BadgeTest extends TestCase
{
    public function testNormalBadge()
    {
        Badge::$counter = 0;
        $html = Badge::widget([
            'content' => 'New',
            'color' => 'primary',
        ]);

        $expectedHtml = '<span id="w0" class="badge bg-primary">New</span>';
        $this->assertEquals($expectedHtml, $html);
    }

    public function testDotBadge()
    {
        Badge::$counter = 0;
        $html = Badge::widget([
            'dot' => true,
            'color' => 'success',
        ]);

        $expectedHtml = '<span id="w0" class="badge badge-dot bg-success"></span>';
        $this->assertEquals($expectedHtml, $html);
    }

    public function testPillBadge()
    {
        Badge::$counter = 10;
        $html = Badge::widget([
            'content' => '99+',
            'pill' => true,
            'color' => 'danger',
        ]);

        $expectedHtml = '<span id="w10" class="badge bg-danger badge-pill">99+</span>';
        $this->assertEquals($expectedHtml, $html);
    }
}
