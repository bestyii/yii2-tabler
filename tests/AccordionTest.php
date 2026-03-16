<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Accordion;

/**
 * Tests for Accordion widget
 */
class AccordionTest extends TestCase
{
    public function testNormalAccordion()
    {
        Accordion::$counter = 0;
        $html = Accordion::widget([
            'items' => [
                [
                    'title' => 'Header 1',
                    'content' => 'Content 1',
                    'active' => true,
                ],
                [
                    'title' => 'Header 2',
                    'content' => 'Content 2',
                ],
            ],
        ]);

        $this->assertStringContainsString('<div id="w0" class="accordion">', $html);
        $this->assertStringContainsString('accordion-item', $html);
        $this->assertStringContainsString('data-bs-target="#w0-collapse-0"', $html);
        $this->assertStringContainsString('id="w0-collapse-0"', $html);
        $this->assertStringContainsString('accordion-collapse collapse show', $html);
        $this->assertStringContainsString('accordion-collapse collapse', $html);
    }
}
