<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Dropdown extends Widget
{
    public array $items = [];
    public ?string $align = null;
    public bool $arrow = true;
    public bool $card = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'dropdown-menu');
        if ($this->arrow) {
            Html::addCssClass($this->options, 'dropdown-menu-arrow');
        }
        if ($this->card) {
            Html::addCssClass($this->options, 'dropdown-menu-card');
        }
        if ($this->align === 'end') {
            Html::addCssClass($this->options, 'dropdown-menu-end');
        } elseif ($this->align === 'start') {
            Html::addCssClass($this->options, 'dropdown-menu-start');
        }

        return Html::tag('div', implode("\n", $this->renderItems($this->items)), $this->options);
    }

    /**
     * @param array<int, array|string> $items
     * @return array<int, string>
     */
    private function renderItems(array $items): array
    {
        $lines = [];
        foreach ($items as $item) {
            if ($item === '-') {
                $lines[] = Html::tag('div', '', ['class' => 'dropdown-divider']);
                continue;
            }

            if (is_string($item)) {
                $lines[] = $item;
                continue;
            }

            if (($item['visible'] ?? true) === false) {
                continue;
            }

            if (($item['type'] ?? null) === 'header') {
                $lines[] = Html::tag('div', (string) ($item['label'] ?? ''), ['class' => 'dropdown-header']);
                continue;
            }

            $label = (string) ($item['label'] ?? '');
            $url = $item['url'] ?? '#';
            $itemOptions = (array) ($item['options'] ?? []);
            $linkOptions = (array) ($item['linkOptions'] ?? []);

            if (!empty($item['icon'])) {
                $label = Icon::widget([
                    'name' => (string) $item['icon'],
                    'options' => ['class' => 'dropdown-item-icon'],
                ]) . $label;
            }

            Html::addCssClass($linkOptions, 'dropdown-item');
            if (!empty($item['active'])) {
                Html::addCssClass($linkOptions, 'active');
            }

            if (!empty($item['items']) && is_array($item['items'])) {
                Html::addCssClass($itemOptions, 'dropend');
                Html::addCssClass($linkOptions, 'dropdown-toggle');
                $linkOptions['data-bs-toggle'] = 'dropdown';
                $lines[] = Html::tag(
                    'div',
                    Html::a($label, $url, $linkOptions) .
                    Html::tag('div', implode("\n", $this->renderItems($item['items'])), ['class' => 'dropdown-menu']),
                    $itemOptions
                );
                continue;
            }

            $lines[] = Html::a($label, $url, $linkOptions);
        }

        return $lines;
    }
}
