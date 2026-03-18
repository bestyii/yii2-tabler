<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Accordion;

class AccordionTest extends TestCase
{
    public function testAccordionRendersFlushLayoutAndExpandedPanel(): void
    {
        $html = Accordion::widget([
            'flush' => true,
            'items' => [
                ['title' => 'Navigation parity', 'content' => 'Mirror and hybrid links', 'active' => true],
                ['title' => 'Dense layouts', 'content' => 'Table and pagination checks'],
            ],
        ]);

        $this->assertStringContainsString('accordion accordion-flush', $html);
        $this->assertStringContainsString('accordion-button', $html);
        $this->assertStringContainsString('accordion-collapse collapse show', $html);
        $this->assertStringContainsString('Mirror and hybrid links', $html);
        $this->assertStringContainsString('data-bs-parent', $html);
    }

    public function testAccordionSupportsCustomHeaderTagAndButtonContent(): void
    {
        $html = Accordion::widget([
            'headerTag' => 'div',
            'options' => ['class' => 'accordion accordion-tabs'],
            'items' => [
                [
                    'buttonContent' => 'Question<div class="accordion-button-toggle"><i class="ti ti-chevron-down"></i></div>',
                    'content' => '<p class="mb-0">Answer</p>',
                    'active' => true,
                    'encode' => false,
                    'bodyOptions' => ['class' => 'accordion-body pt-0'],
                ],
            ],
        ]);

        $this->assertStringContainsString('accordion-tabs', $html);
        $this->assertStringContainsString('<div id="', $html);
        $this->assertStringContainsString('accordion-button-toggle', $html);
        $this->assertStringContainsString('accordion-body pt-0', $html);
    }
}
