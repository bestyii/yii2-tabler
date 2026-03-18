<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class NavSegmented extends Widget
{
    public array $items = [];
    public bool $vertical = false;
    public ?string $size = null;
    public bool $fullWidth = false;
    public ?string $name = null;
    public bool $encodeLabels = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, ['nav', 'nav-segmented']);
        if ($this->vertical) {
            Html::addCssClass($this->options, 'nav-segmented-vertical');
            $this->options['aria-orientation'] = 'vertical';
        }
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, 'nav-' . $this->size);
        }
        if ($this->fullWidth) {
            Html::addCssClass($this->options, 'w-100');
        }
        $this->options['role'] = 'tablist';

        $items = [];
        foreach (array_values($this->items) as $index => $item) {
            $items[] = $this->renderItem($item, $index);
        }

        return Html::tag('nav', implode("\n", $items), $this->options);
    }

    private function renderItem(array $item, int $index): string
    {
        $active = (bool) ($item['active'] ?? false);
        $disabled = (bool) ($item['disabled'] ?? false);
        $label = $this->encodeLabels ? Html::encode((string) ($item['label'] ?? '')) : (string) ($item['label'] ?? '');
        $content = '';

        if (!empty($item['icon'])) {
            $content .= Icon::widget([
                'name' => (string) $item['icon'],
                'options' => ['class' => 'nav-link-icon'],
            ]);
        }
        $content .= $label;

        $linkOptions = (array) ($item['options'] ?? []);
        Html::addCssClass($linkOptions, 'nav-link');
        if ($disabled) {
            Html::addCssClass($linkOptions, 'disabled');
            $linkOptions['aria-disabled'] = 'true';
        }

        if ($this->name !== null && $this->name !== '') {
            $inputId = $this->getId() . '-' . ($item['value'] ?? ($index + 1));
            $input = Html::radio($this->name, $active, [
                'id' => $inputId,
                'class' => 'nav-link-input',
                'value' => (string) ($item['value'] ?? ($index + 1)),
                'disabled' => $disabled,
            ]);

            return $input . Html::tag('label', $content, array_merge($linkOptions, [
                'for' => $inputId,
                'role' => 'tab',
                'aria-selected' => $active ? 'true' : 'false',
            ]));
        }

        if (!empty($item['url'])) {
            if ($active) {
                Html::addCssClass($linkOptions, 'active');
                $linkOptions['aria-current'] = 'page';
            }

            return Html::a($content, $item['url'], array_merge($linkOptions, [
                'role' => 'tab',
                'aria-selected' => $active ? 'true' : 'false',
            ]));
        }

        if ($active) {
            Html::addCssClass($linkOptions, 'active');
        }

        return Html::button($content, array_merge($linkOptions, [
            'type' => 'button',
            'role' => 'tab',
            'aria-selected' => $active ? 'true' : 'false',
        ]));
    }
}
