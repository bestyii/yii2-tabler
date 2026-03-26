<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use bestyii\tabler\Popover;
use yii\web\View;

class PopoverTest extends TestCase
{
    public function testPopoverRegistersBootstrapInitScript(): void
    {
        $html = Popover::widget([
            'title' => 'Quick details',
            'content' => '<strong>Popover body</strong>',
            'toggleButton' => [
                'label' => 'Inspect',
            ],
        ]);
        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('data-bs-toggle="popover"', $html);
        $this->assertStringContainsString('Inspect', $html);
        $this->assertStringContainsString('bootstrap.Popover', $scripts);
        $this->assertStringContainsString('Popover body', $scripts);
    }

    public function testPopoverShortcutSupportsPlacementAndTrigger(): void
    {
        $html = Popover::top(
            content: '<strong>Top body</strong>',
            title: 'Top details',
            trigger: Popover::TRIGGER_HOVER,
            toggleButton: [
                'label' => 'Hover me',
            ],
        );
        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('Hover me', (string) $html);
        $this->assertStringContainsString('data-bs-toggle="popover"', (string) $html);
        $this->assertStringContainsString('Top body', $scripts);
        $this->assertStringContainsString('top', $scripts);
        $this->assertStringContainsString('hover', $scripts);
    }

    public function testPopoverMakeSupportsDynamicPlacementAndClientOptions(): void
    {
        $html = Popover::make(
            placement: Popover::PLACEMENT_RIGHT,
            content: 'Focus details',
            title: 'Focus title',
            trigger: Popover::TRIGGER_FOCUS,
            toggleButton: [
                'label' => 'Focus me',
                'tag' => 'a',
                'href' => '#details',
            ],
            clientOptions: [
                'customClass' => 'popover-wide',
            ],
        );
        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('href="#details"', (string) $html);
        $this->assertStringContainsString('Focus me', (string) $html);
        $this->assertStringContainsString('Focus details', $scripts);
        $this->assertStringContainsString('focus', $scripts);
        $this->assertStringContainsString('popover-wide', $scripts);
    }
}
