<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Card;

class CardTest extends TestCase
{
    public function testCardRendersStatusHeaderBodyAndFooter(): void
    {
        $html = Card::widget([
            'title' => 'Revenue',
            'subtitle' => 'This month',
            'content' => '<strong>$12k</strong>',
            'footer' => 'Updated just now',
            'statusColor' => 'green',
        ]);

        $this->assertStringContainsString('class="card"', $html);
        $this->assertStringContainsString('card-status-top bg-green', $html);
        $this->assertStringContainsString('card-title', $html);
        $this->assertStringContainsString('This month', $html);
        $this->assertStringContainsString('card-body', $html);
        $this->assertStringContainsString('Updated just now', $html);
    }
}
