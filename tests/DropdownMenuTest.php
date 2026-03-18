<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\DropdownMenu;

class DropdownMenuTest extends TestCase
{
    public function testDropdownMenuRendersHeadersChoicesAndStates(): void
    {
        $html = DropdownMenu::widget([
            'show' => true,
            'dark' => true,
            'items' => [
                ['type' => 'header', 'label' => 'Actions'],
                ['label' => 'Open preview', 'icon' => 'layout', 'badge' => '12'],
                '-',
                ['type' => 'checkbox', 'label' => 'Keep pinned', 'checked' => true],
                ['label' => 'Danger', 'danger' => true],
            ],
        ]);

        $this->assertStringContainsString('dropdown-menu-demo', $html);
        $this->assertStringContainsString('data-bs-theme="dark"', $html);
        $this->assertStringContainsString('dropdown-header', $html);
        $this->assertStringContainsString('dropdown-divider', $html);
        $this->assertStringContainsString('form-check-input', $html);
        $this->assertStringContainsString('text-danger', $html);
    }
}
