<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Pagination extends Widget
{
    public array $items = [];
    public ?string $size = null;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'pagination');
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, 'pagination-' . $this->size);
        }

        $items = [];
        foreach ($this->items as $item) {
            if (($item['visible'] ?? true) === false) {
                continue;
            }

            $itemOptions = (array) ($item['options'] ?? []);
            $linkOptions = (array) ($item['linkOptions'] ?? []);
            Html::addCssClass($itemOptions, 'page-item');
            Html::addCssClass($linkOptions, 'page-link');

            $label = (string) ($item['label'] ?? '');
            $disabled = !empty($item['disabled']);
            $active = !empty($item['active']);

            if ($disabled) {
                Html::addCssClass($itemOptions, 'disabled');
            }
            if ($active) {
                Html::addCssClass($itemOptions, 'active');
                $itemOptions['aria-current'] = 'page';
            }

            $content = $disabled || $active || !isset($item['url'])
                ? Html::tag('span', Html::encode($label), $linkOptions)
                : Html::a(Html::encode($label), $item['url'], $linkOptions);

            $items[] = Html::tag('li', $content, $itemOptions);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }
}
