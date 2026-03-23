<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Button;
use bestyii\tabler\Modal;

class ModalTest extends TestCase
{
    public function testModalRendersStatusTitleBodyAndFooter(): void
    {
        $html = Modal::widget([
            'title' => 'Create Project',
            'body' => '<p>Form body</p>',
            'footer' => Button::widget([
                'label' => 'Save',
            ]),
            'size' => 'lg',
            'status' => 'success',
        ]);

        $this->assertStringContainsString('class="modal fade modal-blur"', $html);
        $this->assertStringContainsString('modal-lg', $html);
        $this->assertStringContainsString('modal-status bg-success', $html);
        $this->assertStringContainsString('modal-title', $html);
        $this->assertStringContainsString('<p>Form body</p>', $html);
        $this->assertStringContainsString('modal-footer', $html);
        $this->assertStringContainsString('btn-close', $html);
    }
}
