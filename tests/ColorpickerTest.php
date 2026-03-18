<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Colorpicker;

class ColorpickerTest extends TestCase
{
    public function testColorpickerRendersInputAndRegistersColoris(): void
    {
        $html = Colorpicker::widget([
            'name' => 'brand_color',
            'value' => '#066fd1',
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('form-control', $html);
        $this->assertStringContainsString('#066fd1', $html);
        $this->assertStringContainsString('Coloris', $scripts);
    }
}
