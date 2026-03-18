<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\SignaturePadAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Signature extends Widget
{
    public ?string $name = null;
    public ?string $value = null;
    public int $height = 180;
    public bool $showClearButton = true;
    public string $clearLabel = 'Clear';
    public array $pluginOptions = [];
    public array $options = [];
    public array $canvasOptions = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, ['signature', 'position-relative']);

        $canvasId = $this->options['id'] . '-canvas';
        $inputId = $this->name === null ? null : $this->options['id'] . '-value';
        $clearButtonId = $this->showClearButton ? $this->options['id'] . '-clear' : null;

        $canvasOptions = array_merge([
            'id' => $canvasId,
            'width' => 600,
            'height' => $this->height,
        ], $this->canvasOptions);
        Html::addCssClass($canvasOptions, ['signature-canvas', 'd-block', 'w-100']);
        $canvasOptions['style'] = trim(($canvasOptions['style'] ?? '') . ';height:' . $this->height . 'px;');

        $content = [];
        if ($inputId !== null) {
            $content[] = Html::hiddenInput($this->name, $this->value, ['id' => $inputId]);
        }
        if ($clearButtonId !== null) {
            $content[] = Html::button($this->clearLabel, [
                'type' => 'button',
                'id' => $clearButtonId,
                'class' => 'btn btn-sm btn-ghost-secondary position-absolute top-0 end-0 m-2',
            ]);
        }
        $content[] = Html::tag('canvas', '', $canvasOptions);

        $this->registerPlugin($canvasId, $inputId, $clearButtonId);

        return Html::tag('div', implode("\n", $content), $this->options);
    }

    private function registerPlugin(string $canvasId, ?string $inputId, ?string $clearButtonId): void
    {
        SignaturePadAsset::register($this->getView());

        $canvasIdJson = Json::htmlEncode($canvasId);
        $inputIdJson = Json::htmlEncode($inputId);
        $clearButtonIdJson = Json::htmlEncode($clearButtonId);
        $initialValueJson = Json::htmlEncode($this->value);
        $configJson = Json::htmlEncode(array_merge([
            'backgroundColor' => 'transparent',
        ], $this->pluginOptions));

        $js = <<<JS
(() => {
  const canvas = document.getElementById($canvasIdJson);
  if (!canvas || !window.SignaturePad || canvas.dataset.tablerSignatureInit === '1') {
    return;
  }

  const inputId = $inputIdJson;
  const clearButtonId = $clearButtonIdJson;
  const initialValue = $initialValueJson;
  const input = inputId ? document.getElementById(inputId) : null;
  const clearButton = clearButtonId ? document.getElementById(clearButtonId) : null;
  const signaturePad = new SignaturePad(canvas, $configJson);

  const syncInput = () => {
    if (!input) {
      return;
    }
    input.value = signaturePad.isEmpty() ? '' : signaturePad.toDataURL();
  };

  const resizeCanvas = () => {
    const ratio = Math.max(window.devicePixelRatio || 1, 1);
    const existingData = signaturePad.isEmpty() ? null : signaturePad.toData();
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    const context = canvas.getContext('2d');
    if (context) {
      context.scale(ratio, ratio);
    }
    if (existingData) {
      signaturePad.fromData(existingData);
    }
    syncInput();
  };

  if (initialValue) {
    try {
      signaturePad.fromDataURL(initialValue);
    } catch (error) {
    }
  }

  if (typeof signaturePad.addEventListener === 'function') {
    signaturePad.addEventListener('endStroke', syncInput);
  } else {
    canvas.addEventListener('mouseup', syncInput);
    canvas.addEventListener('touchend', syncInput);
  }

  if (clearButton) {
    clearButton.addEventListener('click', () => {
      signaturePad.clear();
      syncInput();
    });
  }

  window.addEventListener('resize', resizeCanvas);
  resizeCanvas();
  canvas.dataset.tablerSignatureInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }
}
