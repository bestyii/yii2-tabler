<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Hr extends Widget
{
    public string $text = 'Label';
    public ?string $position = null;
    public ?string $color = null;
    public bool $encode = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'hr-text');
        if ($this->position !== null && $this->position !== '') {
            Html::addCssClass($this->options, 'hr-text-' . strtolower($this->position));
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'text-' . $this->color);
        }

        return Html::tag('div', $this->encode ? Html::encode($this->text) : $this->text, $this->options);
    }
}
