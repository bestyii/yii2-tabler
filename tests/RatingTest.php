<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Rating;

class RatingTest extends TestCase
{
    public function testRatingRendersFilledAndEmptyIcons(): void
    {
        $html = Rating::widget([
            'value' => 4,
            'showValue' => true,
        ]);

        $this->assertSame(4, substr_count($html, 'ti-star-filled'));
        $this->assertSame(1, substr_count($html, 'ti-star"'));
        $this->assertStringContainsString('4.0/5', $html);
    }
}
