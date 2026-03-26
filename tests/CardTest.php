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
            'contentHtml' => '<strong>$12k</strong>',
            'footerHtml' => '<span class="text-secondary">Updated just now</span>',
            'statusColor' => 'green',
        ]);

        $this->assertStringContainsString('class="card"', $html);
        $this->assertStringContainsString('card-status-top bg-green', $html);
        $this->assertStringContainsString('card-title', $html);
        $this->assertStringContainsString('This month', $html);
        $this->assertStringContainsString('card-body', $html);
        $this->assertXPathExists('//div[contains(@class, "card-body")]//strong[text()="$12k"]', $html);
        $this->assertXPathExists('//div[contains(@class, "card-footer")]//span[text()="Updated just now"]', $html);
    }

    public function testCardStillSupportsLegacyRawContentSlots(): void
    {
        $html = Card::widget([
            'title' => 'Revenue',
            'content' => '<strong>$12k</strong>',
            'footer' => '<span>Updated just now</span>',
        ]);

        $this->assertXPathExists('//div[contains(@class, "card-body")]//strong[text()="$12k"]', $html);
        $this->assertXPathExists('//div[contains(@class, "card-footer")]//span[text()="Updated just now"]', $html);
    }
}
