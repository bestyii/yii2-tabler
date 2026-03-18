<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\LitepickerAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Datepicker extends Widget
{
    public string $name = '';
    public ?string $value = null;
    public ?string $placeholder = null;
    public bool $inline = false;
    public bool $withIcon = false;
    public bool $prependIcon = false;
    public string $icon = 'calendar';
    public array $pluginOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        $elementId = $this->options['id'];

        if ($this->inline) {
            Html::addCssClass($this->options, 'datepicker-inline');
            $html = Html::tag('div', '', $this->options);
        } else {
            Html::addCssClass($this->options, 'form-control');
            $this->options['placeholder'] ??= $this->placeholder;
            $html = Html::textInput($this->name, $this->value, $this->options);

            if ($this->withIcon) {
                $addon = Html::tag('span', Icon::widget(['name' => $this->icon]), ['class' => 'input-icon-addon']);
                $wrapperClass = $this->prependIcon ? 'input-icon input-icon-start' : 'input-icon';
                $html = Html::tag('div', $this->prependIcon ? $addon . $html : $html . $addon, ['class' => $wrapperClass]);
            }
        }

        $this->registerPlugin($elementId);

        return $html;
    }

    private function registerPlugin(string $elementId): void
    {
        LitepickerAsset::register($this->getView());

        $options = $this->pluginOptions;
        if ($this->inline) {
            $options['inlineMode'] = true;
        }

        $id = Json::htmlEncode($elementId);
        $config = Json::htmlEncode($options);
        $js = <<<JS
(() => {
  const element = document.getElementById($id);
  if (!element || !window.Litepicker || element.dataset.tablerDatepickerInit === '1') {
    return;
  }
  new Litepicker(Object.assign({ element }, $config));
  element.dataset.tablerDatepickerInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }
}
