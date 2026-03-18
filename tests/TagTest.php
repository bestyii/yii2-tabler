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
}
