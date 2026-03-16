<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Card;

/**
 * Tests for Card widget
 */
class CardTest extends TestCase
{
    public function testNormalCard()
    {
        Card::$counter = 0;
        $html = Card::widget([
            'title' => 'Card Title',
            'content' => 'Card Body Content',
        ]);

        $this->assertStringContainsString('<div id="w0" class="card">', $html);
        $this->assertStringContainsString('<h3 class="card-title">Card Title</h3>', $html);
        $this->assertStringContainsString('Card Body Content', $html);
        $this->assertStringContainsString('card-body', $html);
    }

    public function testCardWithStatus()
    {
        Card::$counter = 0;
        $html = Card::widget([
            'content' => 'Content',
            'statusPosition' => 'top',
            'statusColor' => 'primary',
        ]);

        $this->assertStringContainsString('<div class="card-status-top bg-primary"></div>', $html);
    }

    public function testCardWithFooter()
    {
        Card::$counter = 0;
        $html = Card::widget([
            'body' => 'Body',
            'footer' => 'Footer Content',
        ]);

        $this->assertStringContainsString('<div class="card-footer">Footer Content</div>', $html);
    }
}
