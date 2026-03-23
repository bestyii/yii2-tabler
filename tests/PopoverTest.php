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
}
