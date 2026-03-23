<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class StatusDot extends Widget
{
    public ?string $color = null;
    public bool $animated = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'status-dot');
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, ['status-' . $this->color, 'bg-' . $this->color]);
        }
        if ($this->animated) {
            Html::addCssClass($this->options, 'status-dot-animated');
        }

        return Html::tag('span', '', $this->options);
    }
}
