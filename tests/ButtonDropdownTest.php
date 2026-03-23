<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\ButtonDropdown;

class ButtonDropdownTest extends TestCase
{
    public function testButtonDropdownRendersToggleAndMenu(): void
    {
        $html = ButtonDropdown::widget([
            'label' => 'Actions',
            'color' => 'secondary',
            'dropdown' => [
                'items' => [
                    [
                        'label' => 'Edit',
                        'url' => '/edit',
                    ],
                    [
                        'label' => 'Archive',
                        'url' => '/archive',
                    ],
                ],
            ],
        ]);

        $this->assertStringContainsString('btn-group', $html);
        $this->assertStringContainsString('btn-secondary', $html);
        $this->assertStringContainsString('dropdown-toggle', $html);
        $this->assertStringContainsString('dropdown-menu', $html);
        $this->assertStringContainsString('Archive', $html);
    }
}
