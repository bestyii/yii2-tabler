<?php

namespace bestyii\tabler\tests;

use bestyii\tabler\Icon;
use bestyii\tabler\Badge;
use bestyii\tabler\StatusDot;
use PHPUnit\Framework\TestCase;

class HtmlTest extends TestCase
{
    public function testIcon()
    {
        $html = Icon::widget(['name' => 'home']);
        $this->assertStringContainsString('ti ti-home', $html);
        $this->assertStringContainsString('icon', $html);
    }

    public function testBadge()
    {
        $html = Badge::widget(['content' => 'New', 'color' => 'success']);
        $this->assertStringContainsString('badge', $html);
        $this->assertStringContainsString('bg-success', $html);
        $this->assertStringContainsString('New', $html);
    }

    public function testStatusDot()
    {
        $html = StatusDot::widget(['color' => 'danger']);
        $this->assertStringContainsString('status-dot', $html);
        $this->assertStringContainsString('status-dot-danger', $html);
    }
}
