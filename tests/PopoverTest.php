<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use bestyii\tabler\Popover;
use yii\web\View;

class PopoverTest extends TestCase
{
    public function testPopoverDefaultsToTextContentAndSanitization(): void
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
        $this->assertStringContainsString('"html":false', $scripts);
        $this->assertStringContainsString('"sanitize":true', $scripts);
        $this->assertStringContainsString('\\u003Cstrong\\u003EPopover body\\u003C\\/strong\\u003E', $scripts);
    }

    public function testPopoverShortcutSupportsExplicitHtmlContent(): void
    {
        $html = Popover::top(
            contentHtml: '<strong>Top body</strong>',
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
        $this->assertStringContainsString('"html":true', $scripts);
        $this->assertStringContainsString('"sanitize":true', $scripts);
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

        $this->assertXPathExists('//a[@href="#details" and text()="Focus me"]', (string) $html);
        $this->assertStringContainsString('Focus details', $scripts);
        $this->assertStringContainsString('focus', $scripts);
        $this->assertStringContainsString('popover-wide', $scripts);
    }

    public function testPopoverEncodesToggleLabelByDefault(): void
    {
        $html = Popover::widget([
            'content' => 'Safe body',
            'toggleButton' => [
                'label' => '<strong>Inspect</strong>',
            ],
        ]);

        $this->assertStringContainsString('&lt;strong&gt;Inspect&lt;/strong&gt;', $html);
        $this->assertXPathCount(0, '//button/strong', $html);
    }
}
