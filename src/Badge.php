<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Badge extends Widget
{
    public string $text = '';
    public string $color = 'secondary';
    public bool $lite = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, ['badge' => 'badge']);
        Html::addCssClass($this->options, $this->lite ? 'bg-' . $this->color . '-lt' : 'bg-' . $this->color);

        return Html::tag('span', Html::encode($this->text), $this->options);
    }
}
