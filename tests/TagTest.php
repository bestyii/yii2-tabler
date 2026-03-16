<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Tag;

/**
 * Tests for Tag widget
 */
class TagTest extends TestCase
{
    public function testNormalTag()
    {
        Tag::$counter = 0;
        $html = Tag::widget([
            'content' => 'Tag Content',
        ]);

        $this->assertStringContainsString('<span id="w0" class="tag">Tag Content</span>', $html);
    }

    public function testTagVariations()
    {
        Tag::$counter = 0;
        $html = Tag::widget([
            'color' => 'red',
            'pill' => true,
        ]);

        $this->assertStringContainsString('bg-red', $html);
        $this->assertStringContainsString('rounded-pill', $html);
    }

    public function testDismissibleTag()
    {
        Tag::$counter = 0;
        $html = Tag::widget([
            'content' => 'Dismissible',
            'isDismissible' => true,
        ]);

        $this->assertStringContainsString('btn-close', $html);
    }
}
