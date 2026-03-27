<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\helpers\Html;

class HtmlTest extends TestCase
{
    /**
     * Test generating a div tag.
     */
    public function testDiv(): void
    {
        $content = 'Test content';
        $options = [
            'class' => 'test-class',
        ];
        $html = Html::div($content, $options);
        $this->assertEquals('<div class="test-class">Test content</div>', $html);
    }

    /**
     * Test generating a span tag.
     */
    public function testSpan(): void
    {
        $content = 'Test content';
        $options = [
            'class' => 'test-class',
        ];
        $html = Html::span($content, $options);
        $this->assertEquals('<span class="test-class">Test content</span>', $html);
    }
}
