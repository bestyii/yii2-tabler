<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Flag extends Widget
{
    public string $country = 'pl';
    public ?string $size = null;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'flag');
        Html::addCssClass($this->options, 'flag-country-' . strtolower($this->country));
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, 'flag-' . $this->size);
        }

        return Html::tag('span', '', $this->options);
    }
}
