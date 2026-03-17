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
}
