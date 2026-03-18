<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\JsVectorMapAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class VectorMap extends Widget
{
    public array $mapOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();

        $this->registerPlugin();

        return Html::tag('div', '', $this->options);
    }

    private function registerPlugin(): void
    {
        JsVectorMapAsset::register($this->getView());

        $config = array_merge([
            'selector' => '#' . $this->options['id'],
        ], $this->mapOptions);

        $configJson = Json::htmlEncode($config);
        $js = <<<JS
(() => {
  if (!window.jsVectorMap) {
    return;
  }
  const selector = $configJson.selector;
  const element = document.querySelector(selector);
  if (!element || element.dataset.tablerVectorMapInit === '1') {
    return;
  }
  new jsVectorMap($configJson);
  element.dataset.tablerVectorMapInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }
}
