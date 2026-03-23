<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class StatusIndicator extends Widget
{
    public ?string $color = null;
    public bool $animated = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'status-indicator');
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'status-' . $this->color);
        }
        if ($this->animated) {
            Html::addCssClass($this->options, 'status-indicator-animated');
        }

        $circle = Html::tag('span', '', [
            'class' => 'status-indicator-circle',
        ]);

        return Html::tag('span', $circle . $circle . $circle, $this->options);
    }
}
