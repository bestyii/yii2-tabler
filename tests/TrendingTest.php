<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Trending;

class TrendingTest extends TestCase
{
    public function testTrendingRendersPositiveDelta(): void
    {
        $html = Trending::widget([
            'value' => 12,
        ]);

        $this->assertStringContainsString('text-green', $html);
        $this->assertStringContainsString('12%', $html);
        $this->assertStringContainsString('arrow-up', $html);
    }
}
