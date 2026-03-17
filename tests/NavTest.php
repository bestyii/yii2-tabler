<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Nav;

class NavTest extends TestCase
{
    public function testNavRendersIconsActiveItemsAndDropdowns(): void
    {
        $html = Nav::widget([
            'items' => [
                [
                    'label' => 'Dashboard',
                    'url' => '/dashboard',
                    'icon' => 'home',
                    'active' => true,
                ],
                [
                    'label' => 'Settings',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Profile', 'url' => '/profile'],
                    ],
                ],
            ],
        ]);

        $this->assertStringContainsString('navbar-nav', $html);
        $this->assertStringContainsString('nav-link-title', $html);
        $this->assertStringContainsString('ti-home', $html);
        $this->assertStringContainsString('dropdown-menu', $html);
        $this->assertStringContainsString('dropdown-item', $html);
        $this->assertStringContainsString('class="nav-item active"', $html);
    }
}
