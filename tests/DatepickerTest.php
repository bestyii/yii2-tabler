<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Datepicker;

class DatepickerTest extends TestCase
{
    public function testDatepickerRendersIconAndRegistersLitepicker(): void
    {
        $html = Datepicker::widget([
            'name' => 'release_window',
            'value' => '2026-03-18',
            'placeholder' => 'Select a date',
            'withIcon' => true,
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('input-icon', $html);
        $this->assertStringContainsString('form-control', $html);
        $this->assertStringContainsString('Litepicker', $scripts);
    }
}
