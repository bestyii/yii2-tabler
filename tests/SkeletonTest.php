<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Skeleton;

/**
 * Tests for Skeleton widget
 */
class SkeletonTest extends TestCase
{
    public function testLineSkeleton()
    {
        Skeleton::$counter = 0;
        $html = Skeleton::widget([
            'type' => 'line',
        ]);

        $this->assertStringContainsString('<div id="w0" class="placeholder"></div>', $html);
    }

    public function testAvatarSkeleton()
    {
        Skeleton::$counter = 0;
        $html = Skeleton::widget([
            'type' => 'avatar',
        ]);

        $this->assertStringContainsString('avatar', $html);
        $this->assertStringContainsString('placeholder', $html);
    }

    public function testImageSkeleton()
    {
        Skeleton::$counter = 0;
        $html = Skeleton::widget([
            'type' => 'image',
        ]);

        $this->assertStringContainsString('placeholder-image', $html);
        $this->assertStringContainsString('ti-photo', $html);
    }
}
