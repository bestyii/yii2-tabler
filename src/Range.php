<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\NouisliderAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Range extends Widget
{
    public string $name = '';
    public mixed $value = null;
    public int|float|array $start = 0;
    public int|float $min = 0;
    public int|float $max = 100;
    public int|float $step = 1;
    public bool|array $connect = [true, false];
    public bool $plugin = true;
    public ?string $color = null;
    public array $pluginOptions = [];
    public array $options = [];
    public array $hiddenInputOptions = [];

    public function run(): string
    {
        return $this->plugin ? $this->renderPluginRange() : $this->renderNativeRange();
    }

    private function renderNativeRange(): string
    {
        Html::addCssClass($this->options, 'form-range');
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'text-' . $this->color);
        }

        return Html::input('range', $this->name, $this->value ?? $this->start, array_merge([
            'min' => $this->min,
            'max' => $this->max,
            'step' => $this->step,
        ], $this->options));
    }

    private function renderPluginRange(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, 'form-range');
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'text-' . $this->color);
        }

        $hidden = '';
        $currentValue = $this->value ?? $this->start;
        if ($this->name !== '') {
            $hiddenId = $this->hiddenInputOptions['id'] ?? $this->options['id'] . '-value';
            $this->hiddenInputOptions['id'] = $hiddenId;
            $hidden = Html::hiddenInput($this->name, is_array($currentValue) ? implode(',', $currentValue) : $currentValue, $this->hiddenInputOptions);
        }

        $slider = Html::tag('div', '', $this->options);
        $this->registerPlugin($this->options['id'], $this->hiddenInputOptions['id'] ?? null);

        return $hidden . $slider;
    }

    private function registerPlugin(string $sliderId, ?string $hiddenId): void
    {
        NouisliderAsset::register($this->getView());

        $config = array_merge([
            'start' => $this->value ?? $this->start,
            'connect' => $this->connect,
            'step' => $this->step,
            'range' => [
                'min' => $this->min,
                'max' => $this->max,
            ],
        ], $this->pluginOptions);

        $sliderId = Json::htmlEncode($sliderId);
        $hiddenId = $hiddenId === null ? 'null' : Json::htmlEncode($hiddenId);
        $configJson = Json::htmlEncode($config);
        $js = <<<JS
(() => {
  const element = document.getElementById($sliderId);
  if (!element || !window.noUiSlider || element.noUiSlider) {
    return;
  }
  noUiSlider.create(element, $configJson);
  const hidden = $hiddenId ? document.getElementById($hiddenId) : null;
  if (hidden) {
    element.noUiSlider.on('update', values => {
      hidden.value = Array.isArray(values) ? values.join(',') : values;
    });
  }
})();
JS;

        $this->getView()->registerJs($js);
    }
}
