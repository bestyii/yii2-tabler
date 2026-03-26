<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Button;

class ButtonTest extends TestCase
{
    public function testLinkButtonRendersClassesAndIcon(): void
    {
        $html = Button::widget([
            'label' => 'Docs',
            'icon' => 'book-2',
            'url' => '/docs',
            'color' => 'secondary',
            'outline' => true,
        ]);

        $this->assertStringContainsString('btn', $html);
        $this->assertStringContainsString('btn-outline-secondary', $html);
        $this->assertStringContainsString('ti-book-2', $html);
        $this->assertStringContainsString('Docs', $html);
    }

    public function testButtonShortcutSupportsRouteArraysAndNamedArguments(): void
    {
        $html = Button::primary(
            'Open Preview',
            icon: 'eye',
            url: ['/preview'],
            options: [
                'class' => 'w-100',
            ],
        );

        $this->assertStringContainsString('btn-primary', $html);
        $this->assertStringContainsString('href="/index.php?r=preview"', $html);
        $this->assertStringContainsString('ti-eye', $html);
        $this->assertStringContainsString('w-100', $html);
    }

    public function testButtonMakeSupportsDynamicColorAndOutline(): void
    {
        $html = Button::make(
            color: 'danger',
            label: 'Delete',
            outline: true,
            icon: 'trash',
        );

        $this->assertStringContainsString('btn-outline-danger', $html);
        $this->assertStringContainsString('ti-trash', $html);
        $this->assertStringContainsString('Delete', $html);
    }
}
