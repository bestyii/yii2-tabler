<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\ApexChartsAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Chart extends Widget
{
    public array $series = [];
    public array $options = [];
    public array $chartOptions = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();

        $this->registerPlugin();

        return Html::tag('div', '', $this->options);
    }

    private function registerPlugin(): void
    {
        ApexChartsAsset::register($this->getView());

        $config = array_merge($this->chartOptions, [
            'series' => $this->series,
        ]);

        $id = Json::htmlEncode($this->options['id']);
        $configJson = Json::htmlEncode($config);
        $js = <<<JS
(() => {
  const element = document.getElementById($id);
  if (!element || !window.ApexCharts || element.dataset.tablerChartInit === '1') {
    return;
  }
  const chart = new ApexCharts(element, $configJson);
  chart.render();
  element.dataset.tablerChartInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }
}
