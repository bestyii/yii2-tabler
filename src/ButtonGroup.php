<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class ButtonGroup extends Widget
{
    public array $items = [];
    public bool $vertical = false;
    public bool $fluid = false;
    public bool $radio = false;
    public ?string $name = null;
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, $this->vertical ? 'btn-group-vertical' : 'btn-group');
        if ($this->fluid) {
            Html::addCssClass($this->options, 'w-100');
        }
        $this->options['role'] ??= 'group';

        return Html::tag('div', implode("\n", $this->renderItems()), $this->options);
    }

    /**
     * @return array<int, string>
     */
    private function renderItems(): array
    {
        $items = [];

        foreach (array_values($this->items) as $index => $item) {
            $item = is_array($item) ? $item : [
                'label' => (string) $item,
            ];
            if (($item['visible'] ?? true) === false) {
                continue;
            }

            if (!empty($item['items']) && is_array($item['items'])) {
                $items[] = $this->renderDropdownGroup($item, $index);
                continue;
            }

            $items[] = $this->renderButton($item, $index);
        }

        return $items;
    }

    private function renderDropdownGroup(array $item, int $index): string
    {
        $toggle = $this->renderButton([
            'label' => (string) ($item['label'] ?? 'More'),
            'icon' => $item['icon'] ?? null,
            'active' => $item['active'] ?? false,
            'color' => $item['color'] ?? null,
            'outline' => $item['outline'] ?? null,
            'url' => $item['url'] ?? '#',
            'options' => array_merge((array) ($item['options'] ?? []), [
                'data-bs-toggle' => 'dropdown',
                'aria-expanded' => 'false',
            ]),
        ], $index);

        $menu = DropdownMenu::widget([
            'items' => $item['items'],
            'align' => $item['align'] ?? 'end',
            'arrow' => $item['arrow'] ?? false,
        ]);

        return Html::tag('div', $toggle . $menu, [
            'class' => 'btn-group',
            'role' => 'group',
        ]);
    }

    private function renderButton(array $item, int $index): string
    {
        $id = $this->options['id'] . '-item-' . $index;
        $label = $this->renderLabel($item);
        $options = (array) ($item['options'] ?? []);

        $classes = ['btn'];
        if (!empty($item['icon']) && empty($item['label'])) {
            $classes[] = 'btn-icon';
        }

        $color = $item['color'] ?? null;
        $outline = $item['outline'] ?? null;
        if ($color !== null && $color !== '') {
            $classes[] = ($outline ?? false) ? 'btn-outline-' . $color : 'btn-' . $color;
        }

        if (!empty($item['active'])) {
            $classes[] = 'active';
        }

        Html::addCssClass($options, $classes);

        if ($this->radio) {
            $name = $this->name ?? ($this->options['id'] . '-choice');
            $input = Html::input('radio', $name, (string) ($item['value'] ?? $index), [
                'class' => 'btn-check',
                'id' => $id,
                'autocomplete' => 'off',
                'checked' => !empty($item['active']),
            ]);

            return $input . Html::label($label, $id, $options);
        }

        $options['type'] ??= 'button';
        if (!empty($item['url'])) {
            return Html::a($label, (string) $item['url'], $options);
        }

        return Html::tag('button', $label, $options);
    }

    private function renderLabel(array $item): string
    {
        $label = (string) ($item['label'] ?? '');
        if (!empty($item['encodeLabel'])) {
            $label = Html::encode($label);
        }

        if (!empty($item['icon'])) {
            $icon = Icon::widget([
                'name' => (string) $item['icon'],
                'options' => [
                    'class' => $label === '' ? '' : 'me-1',
                ],
            ]);

            return $icon . $label;
        }

        return $label;
    }
}
