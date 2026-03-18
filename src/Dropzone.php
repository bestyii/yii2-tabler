<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\DropzoneAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Dropzone extends Widget
{
    public string $url = './';
    public string $name = 'file';
    public bool $multiple = false;
    public ?string $messageTitle = null;
    public ?string $messageDescription = null;
    public bool $renderFallback = true;
    public array $pluginOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        $this->options['action'] ??= $this->url;
        $this->options['autocomplete'] ??= 'off';
        $this->options['novalidate'] = true;
        Html::addCssClass($this->options, 'dropzone');

        $content = [];
        if ($this->renderFallback) {
            $fallbackOptions = ['name' => $this->name, 'type' => 'file'];
            if ($this->multiple) {
                $fallbackOptions['multiple'] = true;
            }
            $content[] = Html::tag('div', Html::tag('input', '', $fallbackOptions), ['class' => 'fallback']);
        }

        if (($this->messageTitle ?? '') !== '' || ($this->messageDescription ?? '') !== '') {
            $message = '';
            if (($this->messageTitle ?? '') !== '') {
                $message .= Html::tag('h3', Html::encode((string) $this->messageTitle), ['class' => 'dropzone-msg-title']);
            }
            if (($this->messageDescription ?? '') !== '') {
                $message .= Html::tag('span', Html::encode((string) $this->messageDescription), ['class' => 'dropzone-msg-desc']);
            }
            $content[] = Html::tag('div', $message, ['class' => 'dz-message']);
        }

        $this->registerPlugin();

        return Html::tag('form', implode("\n", $content), $this->options);
    }

    private function registerPlugin(): void
    {
        DropzoneAsset::register($this->getView());

        $options = array_merge([
            'url' => $this->url,
        ], $this->pluginOptions);

        $id = Json::htmlEncode($this->options['id']);
        $config = Json::htmlEncode($options);
        $js = <<<JS
(() => {
  const element = document.getElementById($id);
  if (!element || !window.Dropzone || element.dropzone) {
    return;
  }
  if (typeof Dropzone.autoDiscover !== 'undefined') {
    Dropzone.autoDiscover = false;
  }
  new Dropzone(element, $config);
})();
JS;

        $this->getView()->registerJs($js);
    }
}
