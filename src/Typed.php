<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\TypedAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Typed extends Widget
{
    public array $strings = [];
    public ?string $prefix = null;
    public ?string $suffix = null;
    public array $typedOptions = [];
    public array $options = [];

    public function run(): string
    {
        $typedId = $this->options['id'] ?? $this->getId();
        $wrapperOptions = $this->options;
        unset($wrapperOptions['id']);

        $content = '';
        if ($this->prefix !== null) {
            $content .= Html::tag('span', Html::encode($this->prefix), [
                'class' => 'typed-prefix',
            ]);
        }

        $fallback = $this->strings[0] ?? '';
        $content .= Html::tag('span', Html::encode((string) $fallback), [
            'id' => $typedId,
        ]);

        if ($this->suffix !== null) {
            $content .= Html::tag('span', Html::encode($this->suffix), [
                'class' => 'typed-suffix',
            ]);
        }

        $this->registerPlugin($typedId);

        return Html::tag('span', $content, $wrapperOptions);
    }

    private function registerPlugin(string $typedId): void
    {
        if ($this->strings === []) {
            return;
        }

        TypedAsset::register($this->getView());

        $selector = Json::htmlEncode('#' . $typedId);
        $configJson = Json::htmlEncode(array_merge([
            'strings' => array_values($this->strings),
        ], $this->typedOptions));
        $js = <<<JS
(() => {
  if (!window.Typed) {
    return;
  }
  const element = document.querySelector($selector);
  if (!element || element.dataset.tablerTypedInit === '1') {
    return;
  }
  new Typed($selector, $configJson);
  element.dataset.tablerTypedInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }
}
