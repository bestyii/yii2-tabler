<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Toast;

class ToastTest extends TestCase
{
    public function testToastRendersHeaderBodyAndCloseButton(): void
    {
        $html = Toast::widget([
            'title' => 'Deployment complete',
            'subtitle' => 'now',
            'body' => 'The local preview is ready.',
            'icon' => 'check',
        ]);

        $this->assertStringContainsString('class="toast show"', $html);
        $this->assertStringContainsString('toast-header', $html);
        $this->assertStringContainsString('ti-check', $html);
        $this->assertStringContainsString('toast-body', $html);
        $this->assertStringContainsString('btn-close', $html);
    }
}
