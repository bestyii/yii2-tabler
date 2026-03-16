<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Offcanvas;

/**
 * Tests for Offcanvas widget
 */
class OffcanvasTest extends TestCase
{
    public function testNormalOffcanvas()
    {
        Offcanvas::$counter = 0;
        ob_start();
        Offcanvas::begin([
            'title' => 'Offcanvas Title',
            'placement' => 'start',
        ]);
        echo "Body Content";
        Offcanvas::end();
        $html = ob_get_clean();

        $this->assertStringContainsString('<div id="w0" class="offcanvas offcanvas-start offcanvas-blur" tabindex="-1"', $html);
        $this->assertStringContainsString('offcanvas-header', $html);
        $this->assertStringContainsString('offcanvas-title', $html);
        $this->assertStringContainsString('Offcanvas Title', $html);
        $this->assertStringContainsString('data-bs-dismiss="offcanvas"', $html);
    }
}
