<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Tag;

class TagTest extends TestCase
{
    public function testTagRendersIconColorAndRemoveButton(): void
    {
        $html = Tag::widget([
            'label' => 'Dense layout',
            'icon' => 'layout-grid',
            'color' => 'azure',
            'removable' => true,
        ]);

        $this->assertStringContainsString('tag rounded-pill bg-azure-lt', $html);
        $this->assertStringContainsString('ti-layout-grid', $html);
        $this->assertStringContainsString('Dense layout', $html);
        $this->assertStringContainsString('btn-close', $html);
    }

    public function testTagShortcutKeepsDefaultLiteBehavior(): void
    {
        $html = Tag::azure(
            'Filter',
            icon: 'filter',
            removable: true,
            options: [
                'class' => 'me-1',
            ],
        );

        $this->assertStringContainsString('tag rounded-pill bg-azure-lt', $html);
        $this->assertStringContainsString('ti-filter', $html);
        $this->assertStringContainsString('btn-close', $html);
        $this->assertStringContainsString('me-1', $html);
    }

    public function testTagMakeSupportsDynamicColorAndRoutes(): void
    {
        $html = Tag::make(
            color: 'green',
            label: 'Stable lane',
            icon: 'check',
            url: ['/preview/tables'],
        );

        $this->assertStringContainsString('bg-green-lt', $html);
        $this->assertStringContainsString('href="/index.php?r=preview%2Ftables"', $html);
        $this->assertStringContainsString('ti-check', $html);
    }
}
