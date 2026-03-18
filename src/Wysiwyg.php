<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\HugerteAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Wysiwyg extends Widget
{
    public string $name = '';
    public ?string $value = null;
    public bool $enhance = true;
    public array $editorOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, 'form-control');

        $html = Html::textarea($this->name, $this->value, $this->options);

        if ($this->enhance) {
            $this->registerPlugin();
        }

        return $html;
    }

    private function registerPlugin(): void
    {
        HugerteAsset::register($this->getView());

        $id = Json::htmlEncode($this->options['id']);
        $config = Json::htmlEncode(array_merge([
            'selector' => '#' . $this->options['id'],
            'menubar' => false,
            'branding' => false,
            'promotion' => false,
            'statusbar' => false,
            'height' => 280,
        ], $this->editorOptions));

        $js = <<<JS
(() => {
  const element = document.getElementById($id);
  if (!element || !window.hugerte || element.dataset.tablerWysiwygInit === '1') {
    return;
  }
  window.hugerte.init($config);
  element.dataset.tablerWysiwygInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }
}
