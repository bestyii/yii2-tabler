<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Avatar;

class AvatarTest extends TestCase
{
    public function testAvatarRendersBackgroundInitialsAndStatus(): void
    {
        $html = Avatar::widget([
            'src' => '/img/jane.jpg',
            'size' => 'sm',
            'shape' => 'circle',
            'status' => 'success',
            'options' => [
                'class' => 'me-2',
            ],
        ]);

        $this->assertStringContainsString('avatar avatar-sm', $html);
        $this->assertStringContainsString('rounded-circle', $html);
        $this->assertStringContainsString('background-image: url(/img/jane.jpg)', $html);
        $this->assertStringContainsString('badge bg-success', $html);
    }
}
