<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Alert;

class AlertTest extends TestCase
{
    public function testAlertRendersTitleBodyAndIcon(): void
    {
        $html = Alert::widget([
            'title' => 'Saved',
            'body' => 'Profile updated.',
            'type' => 'success',
            'icon' => 'check',
        ]);

        $this->assertStringContainsString('alert-success', $html);
        $this->assertStringContainsString('alert-title', $html);
        $this->assertStringContainsString('Profile updated.', $html);
        $this->assertStringContainsString('ti-check', $html);
        $this->assertStringContainsString('btn-close', $html);
    }
}
