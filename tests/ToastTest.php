<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Toast;

/**
 * Tests for Toast widget
 */
class ToastTest extends TestCase
{
    public function testNormalToast()
    {
        Toast::$counter = 0;
        $html = Toast::widget([
            'title' => 'Notification',
            'subtitle' => 'just now',
            'body' => 'Hello World!',
            'icon' => '<span class="avatar avatar-xs"></span>',
        ]);

        $this->assertStringContainsString('class="toast"', $html);
        $this->assertStringContainsString('toast-header', $html);
        $this->assertStringContainsString('Notification', $html);
        $this->assertStringContainsString('just now', $html);
        $this->assertStringContainsString('toast-body', $html);
        $this->assertStringContainsString('Hello World!', $html);
    }
}
