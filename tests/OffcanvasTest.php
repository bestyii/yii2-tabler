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

    public function testOffcanvasShortcutCanDisableBlur(): void
    {
        $html = Offcanvas::top(
            title: 'Updates',
            body: '<p>Top panel</p>',
            blur: false,
            options: [
                'class' => 'shadow-sm',
            ],
        );

        $this->assertStringContainsString('offcanvas offcanvas-top', $html);
        $this->assertStringContainsString('shadow-sm', $html);
        $this->assertStringNotContainsString('offcanvas-blur', $html);
        $this->assertStringNotContainsString('data-bs-backdrop', $html);
    }

    public function testOffcanvasBeginAndEndStillRenderWidgetLifecycle(): void
    {
        ob_start();
        Offcanvas::begin([
            'title' => 'Filters',
            'placement' => Offcanvas::PLACEMENT_START,
        ]);
        echo '<p>Buffered body</p>';
        Offcanvas::end();

        $html = ob_get_clean();

        $this->assertIsString($html);
        $this->assertStringContainsString('offcanvas offcanvas-start', $html);
        $this->assertStringContainsString('Buffered body', $html);
        $this->assertStringContainsString('Filters', $html);
    }

    public function testOffcanvasMakeSupportsDynamicPlacement(): void
    {
        $html = Offcanvas::make(
            placement: Offcanvas::PLACEMENT_BOTTOM,
            title: 'Release notes',
            body: '<p>Queued rollout</p>',
            options: [
                'data-test' => 'release-offcanvas',
            ],
        );

        $this->assertStringContainsString('offcanvas offcanvas-bottom', $html);
        $this->assertStringContainsString('data-test="release-offcanvas"', $html);
        $this->assertStringContainsString('Release notes', $html);
    }
}
