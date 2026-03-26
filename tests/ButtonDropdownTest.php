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

    public function testButtonDropdownShortcutSupportsSplitOutlineAndDirection(): void
    {
        $html = ButtonDropdown::secondary(
            'Actions',
            dropdown: [
                'items' => [
                    [
                        'label' => 'Edit',
                        'url' => '/edit',
                    ],
                ],
            ],
            direction: ButtonDropdown::DIRECTION_UP,
            split: true,
            buttonOptions: [
                'href' => ['/settings'],
            ],
            outline: true,
            size: 'sm',
        );

        $this->assertStringContainsString('btn-group dropup', $html);
        $this->assertStringContainsString('btn-outline-secondary btn-sm', $html);
        $this->assertStringContainsString('dropdown-toggle-split', $html);
        $this->assertStringContainsString('href="/index.php?r=settings"', $html);
    }

    public function testButtonDropdownMakeSupportsDynamicColorAndIcon(): void
    {
        $html = ButtonDropdown::make(
            color: 'warning',
            label: 'Queue',
            dropdown: [
                'items' => [
                    [
                        'label' => 'Retry',
                        'url' => '/retry',
                    ],
                ],
            ],
            icon: 'settings',
            direction: ButtonDropdown::DIRECTION_RIGHT,
            size: 'sm',
        );

        $this->assertStringContainsString('btn-warning btn-sm', $html);
        $this->assertStringContainsString('dropend', $html);
        $this->assertStringContainsString('ti ti-settings', $html);
        $this->assertStringContainsString('Retry', $html);
    }
}
