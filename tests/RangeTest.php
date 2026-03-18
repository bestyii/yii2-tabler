<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Range;

class RangeTest extends TestCase
{
    public function testPluginRangeRendersHiddenInputAndRegistersNoUiSlider(): void
    {
        $html = Range::widget([
            'name' => 'quality_target',
            'value' => 80,
            'min' => 0,
            'max' => 100,
            'step' => 5,
            'plugin' => true,
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('type="hidden"', $html);
        $this->assertStringContainsString('form-range', $html);
        $this->assertStringContainsString('noUiSlider.create', $scripts);
    }
}
