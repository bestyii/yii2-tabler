<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Offcanvas;

class OffcanvasTest extends TestCase
{
    public function testOffcanvasRendersHeaderBodyAndPlacement(): void
    {
        $html = Offcanvas::widget([
            'title' => 'Filters',
            'body' => '<p>Side panel</p>',
            'placement' => 'start',
        ]);

        $this->assertStringContainsString('offcanvas offcanvas-start', $html);
        $this->assertStringContainsString('offcanvas-blur', $html);
        $this->assertStringContainsString('offcanvas-title', $html);
        $this->assertStringContainsString('offcanvas-body', $html);
        $this->assertStringContainsString('btn-close', $html);
    }
}
