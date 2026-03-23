<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Chart;

class ChartTest extends TestCase
{
    public function testChartRendersAndRegistersApexCharts(): void
    {
        $html = Chart::widget([
            'series' => [
                [
                    'name' => 'Completed',
                    'data' => [12, 18, 24],
                ],
            ],
            'chartOptions' => [
                'chart' => [
                    'type' => 'line',
                ],
            ],
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('<div', $html);
        $this->assertStringContainsString('ApexCharts', $scripts);
        $this->assertStringContainsString('"Completed"', $scripts);
    }
}
