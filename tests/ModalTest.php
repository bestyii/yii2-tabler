<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Modal;

/**
 * Tests for Modal widget
 */
class ModalTest extends TestCase
{
    public function testNormalModal()
    {
        Modal::$counter = 0;
        ob_start();
        Modal::begin([
            'title' => 'Modal Title',
            'footer' => 'Footer Content',
        ]);
        echo "Modal Body Content";
        Modal::end();
        $html = ob_get_clean();

        $this->assertStringContainsString('<div id="w0"', $html);
        $this->assertStringContainsString('modal', $html);
        $this->assertStringContainsString('fade', $html);
        $this->assertStringContainsString('role="dialog"', $html);
        $this->assertStringContainsString('modal-dialog modal-dialog-centered', $html);
        $this->assertStringContainsString('modal-header', $html);
        $this->assertStringContainsString('Modal Title', $html);
        $this->assertStringContainsString('Modal Body Content', $html);
        $this->assertStringContainsString('modal-footer', $html);
    }

    public function testModalStatusAndSize()
    {
        Modal::$counter = 0;
        ob_start();
        Modal::begin([
            'status' => 'success',
            'size' => 'lg',
            'blur' => true,
        ]);
        Modal::end();
        $html = ob_get_clean();

        $this->assertStringContainsString('modal-blur', $html);
        $this->assertStringContainsString('modal-lg', $html);
        $this->assertStringContainsString('modal-status bg-success', $html);
    }
}
