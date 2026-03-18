<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\TomSelectAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Select extends Widget
{
    public string $name = '';
    public mixed $value = null;
    public array $items = [];
    public ?string $prompt = null;
    public bool $multiple = false;
    public bool $enhance = true;
    public array $pluginOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, 'form-select');

        if ($this->prompt !== null && $this->prompt !== '') {
            $this->options['placeholder'] ??= $this->prompt;
        }

        if ($this->multiple) {
            $this->options['multiple'] = true;
            if ($this->name !== '' && !str_ends_with($this->name, '[]')) {
                $this->name .= '[]';
            }
        }

        $html = Html::dropDownList($this->name, $this->value, $this->items, array_merge(
            $this->prompt !== null ? ['prompt' => $this->prompt] : [],
            $this->options
        ));

        if ($this->enhance) {
            $this->registerPlugin();
        }

        return $html;
    }

    private function registerPlugin(): void
    {
        TomSelectAsset::register($this->getView());

        $id = Json::htmlEncode($this->options['id']);
        $options = Json::htmlEncode($this->pluginOptions);
        $js = <<<JS
(() => {
  const element = document.getElementById($id);
  if (!element || !window.TomSelect || element.tomselect) {
    return;
  }
  new TomSelect(element, $options);
})();
JS;

        $this->getView()->registerJs($js);
    }
}
