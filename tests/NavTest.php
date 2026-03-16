<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Nav;

/**
 * Tests for Nav widget
 */
class NavTest extends TestCase
{
    public function testNormalNav()
    {
        Nav::$counter = 0;
        $html = Nav::widget([
            'items' => [
                [
                    'label' => 'Home',
                    'url' => ['site/index'],
                ],
                [
                    'label' => 'About',
                    'url' => ['site/about'],
                ],
            ],
        ]);

        $this->assertStringContainsString('class="navbar-nav nav"', $html);
        $this->assertStringContainsString('Home', $html);
    }

    public function testNavActive()
    {
        $this->mockAction('site', 'index');
        Nav::$counter = 0;
        $html = Nav::widget([
            'items' => [
                [
                    'label' => 'Home',
                    'url' => ['site/index'],
                ],
            ],
        ]);

        $this->assertStringContainsString('active', $html);
    }
}
