<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class AvatarList extends Widget
{
    public array $items = [];
    public bool $stacked = false;
    public ?string $size = 'sm';
    public ?string $placeholderText = null;
    public array $avatarDefaults = [];
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'avatar-list');
        if ($this->stacked) {
            Html::addCssClass($this->options, 'avatar-list-stacked');
        }

        $items = [];
        foreach ($this->items as $item) {
            $items[] = $this->renderAvatar($item);
        }

        if ($this->placeholderText !== null && $this->placeholderText !== '') {
            $items[] = Avatar::widget(array_merge($this->avatarDefaults, [
                'text' => $this->placeholderText,
                'size' => $this->size,
                'shape' => 'circle',
            ]));
        }

        return Html::tag('div', implode("\n", $items), $this->options);
    }

    private function renderAvatar(array|string $item): string
    {
        if (is_string($item)) {
            $item = [
                'text' => $item,
            ];
        }

        return Avatar::widget(array_merge($this->avatarDefaults, $item, [
            'size' => $item['size'] ?? $this->size,
            'shape' => $item['shape'] ?? 'circle',
        ]));
    }
}
