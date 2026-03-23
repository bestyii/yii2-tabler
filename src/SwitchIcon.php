<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class SwitchIcon extends Widget
{
    public string $icon = 'heart';
    public ?string $activeIcon = null;
    public string $inactiveColor = 'muted';
    public string $activeColor = 'red';
    public ?string $variant = null;
    public bool $active = false;
    public array $options = [];

    public function run(): string
    {
        $activeIcon = $this->activeIcon ?? $this->icon;
        $activeIconClass = in_array($activeIcon, ['star', 'heart'], true) ? 'icon-filled' : null;

        Html::addCssClass($this->options, 'switch-icon');
        if ($this->variant !== null && $this->variant !== '') {
            Html::addCssClass($this->options, 'switch-icon-' . $this->variant);
        }
        if ($this->active) {
            Html::addCssClass($this->options, 'active');
        }
        $this->options['type'] ??= 'button';
        $this->options['data-bs-toggle'] ??= 'switch-icon';

        $content = Html::tag('span', Icon::widget([
            'name' => $this->icon,
        ]), [
            'class' => 'switch-icon-a text-' . $this->inactiveColor,
        ]);

        $content .= Html::tag('span', Icon::widget([
            'name' => $activeIcon,
            'options' => $activeIconClass !== null ? [
                'class' => $activeIconClass,
            ] : [],
        ]), [
            'class' => 'switch-icon-b text-' . $this->activeColor,
        ]);

        return Html::tag('button', $content, $this->options);
    }
}
