<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Breadcrumb extends Widget
{
    public array $items = [];
    public bool $encodeLabels = true;
    public array $navOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->navOptions['aria-label'] ??= 'breadcrumb';
        Html::addCssClass($this->options, 'breadcrumb');

        $items = [];
        foreach ($this->items as $item) {
            if (is_string($item)) {
                $item = ['label' => $item, 'active' => true];
            }

            if (($item['visible'] ?? true) === false) {
                continue;
            }

            $label = $this->renderLabel((array) $item);
            $itemOptions = (array) ($item['options'] ?? []);
            Html::addCssClass($itemOptions, 'breadcrumb-item');

            if (!empty($item['active']) || !isset($item['url'])) {
                Html::addCssClass($itemOptions, 'active');
                $itemOptions['aria-current'] = 'page';
                $items[] = Html::tag('li', $label, $itemOptions);
                continue;
            }

            $items[] = Html::tag(
                'li',
                Html::a($label, $item['url'], (array) ($item['linkOptions'] ?? [])),
                $itemOptions
            );
        }

        return Html::tag(
            'nav',
            Html::tag('ol', implode("\n", $items), $this->options),
            $this->navOptions
        );
    }

    private function renderLabel(array $item): string
    {
        $label = (string) ($item['label'] ?? '');
        $encode = (bool) ($item['encode'] ?? $this->encodeLabels);
        $content = $encode ? Html::encode($label) : $label;

        if (!empty($item['icon'])) {
            $content = Icon::widget([
                'name' => (string) $item['icon'],
                'options' => ['class' => 'me-1'],
            ]) . $content;
        }

        return $content;
    }
}
