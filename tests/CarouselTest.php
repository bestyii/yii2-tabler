<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Carousel;

/**
 * Tests for Carousel widget
 */
class CarouselTest extends TestCase
{
    public function testNormalCarousel()
    {
        Carousel::$counter = 0;
        $html = Carousel::widget([
            'items' => [
                ['content' => 'Slide 1', 'caption' => 'Caption 1'],
                ['content' => 'Slide 2'],
            ],
        ]);

        $this->assertStringContainsString('<div id="w0" class="carousel slide" data-bs-ride="carousel">', $html);
        $this->assertStringContainsString('carousel-indicators', $html);
        $this->assertStringContainsString('carousel-inner', $html);
        $this->assertStringContainsString('carousel-item active', $html);
        $this->assertStringContainsString('Caption 1', $html);
        $this->assertStringContainsString('carousel-control-prev', $html);
    }

    public function testCarouselFade()
    {
        Carousel::$counter = 0;
        $html = Carousel::widget([
            'crossfade' => true,
            'items' => [
                'Content 1',
                'Content 2',
            ],
        ]);

        $this->assertStringContainsString('carousel-fade', $html);
    }
}
