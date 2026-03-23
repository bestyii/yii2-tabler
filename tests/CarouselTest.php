<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Carousel;

class CarouselTest extends TestCase
{
    public function testCarouselRendersSlidesAndControls(): void
    {
        $html = Carousel::widget([
            'items' => [
                [
                    'content' => '<div>Slide 1</div>',
                ],
                [
                    'content' => '<div>Slide 2</div>',
                ],
            ],
        ]);

        $this->assertStringContainsString('carousel slide', $html);
        $this->assertStringContainsString('carousel-item active', $html);
        $this->assertStringContainsString('Slide 2', $html);
        $this->assertStringContainsString('carousel-control-next', $html);
    }
}
