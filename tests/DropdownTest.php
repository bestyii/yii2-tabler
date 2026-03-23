<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Dropdown;

class DropdownTest extends TestCase
{
    public function testDropdownRendersItemsIconsAndDivider(): void
    {
        $html = Dropdown::widget([
            'align' => 'end',
            'card' => true,
            'items' => [
                [
                    'label' => 'Profile',
                    'icon' => 'user',
                    'url' => '/profile',
                ],
                '-',
                [
                    'label' => 'Settings',
                    'url' => '/settings',
                    'active' => true,
                ],
            ],
        ]);

        $this->assertStringContainsString('dropdown-menu-end', $html);
        $this->assertStringContainsString('dropdown-menu-card', $html);
        $this->assertStringContainsString('dropdown-item-icon', $html);
        $this->assertStringContainsString('dropdown-divider', $html);
        $this->assertStringContainsString('dropdown-item active', $html);
    }
}
