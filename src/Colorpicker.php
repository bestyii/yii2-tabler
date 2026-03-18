<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\MellowareColorisAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Colorpicker extends Widget
{
    public string $name = '';
    public ?string $value = null;
    public array $pluginOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        $this->options['type'] = 'text';
        Html::addCssClass($this->options, ['form-control', 'd-block']);

        $this->registerPlugin();

        return Html::textInput($this->name, $this->value, $this->options);
    }

    private function registerPlugin(): void
    {
        MellowareColorisAsset::register($this->getView());

        $options = array_merge([
            'el' => '#' . $this->options['id'],
        ], $this->pluginOptions);

        $config = Json::htmlEncode($options);
        $js = <<<JS
(() => {
  if (!window.Coloris) {
    return;
  }
  Coloris($config);
})();
JS;

        $this->getView()->registerJs($js);
    }
}
