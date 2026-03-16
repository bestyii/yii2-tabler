<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Avatar;

/**
 * Tests for Avatar widget
 */
class AvatarTest extends TestCase
{
    public function testNormalAvatar()
    {
        Avatar::$counter = 0;
        $html = Avatar::widget([
            'initials' => 'AB',
        ]);

        $this->assertStringContainsString('<span id="w0" class="avatar">AB</span>', $html);
    }

    public function testAvatarWithUrl()
    {
        Avatar::$counter = 0;
        $html = Avatar::widget([
            'url' => 'https://example.com/avatar.jpg',
        ]);

        $this->assertStringContainsString('style="background-image: url(https://example.com/avatar.jpg)"', $html);
    }

    public function testAvatarSizeAndShape()
    {
        Avatar::$counter = 0;
        $html = Avatar::widget([
            'size' => 'xl',
            'shape' => 'circle',
        ]);

        $this->assertStringContainsString('avatar-xl', $html);
        $this->assertStringContainsString('rounded-circle', $html);
    }

    public function testAvatarColor()
    {
        Avatar::$counter = 0;
        $html = Avatar::widget([
            'color' => 'blue',
            'lite' => false,
        ]);

        $this->assertStringContainsString('bg-blue', $html);
        $this->assertStringNotContainsString('bg-blue-lt', $html);

        Avatar::$counter = 0;
        $html = Avatar::widget([
            'color' => 'red',
            'lite' => true,
        ]);
        $this->assertStringContainsString('bg-red-lt', $html);
    }

    public function testAvatarWithStatus()
    {
        Avatar::$counter = 0;
        $html = Avatar::widget([
            'status' => 'success',
        ]);

        $this->assertStringContainsString('<span class="badge bg-success"></span>', $html);
    }
}
