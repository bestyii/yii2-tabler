<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Spinner extends Widget
{
    public string $type = 'border';
    public ?string $color = null;
    public ?string $size = null;
    public string $label = 'Loading...';
    public array $options = [];

    public function run(): string
    {
        $class = $this->type === 'grow' ? 'spinner-grow' : 'spinner-border';

        Html::addCssClass($this->options, $class);
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, $class . '-' . $this->size);
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'text-' . $this->color);
        }
        $this->options['role'] = $this->options['role'] ?? 'status';

        return Html::tag('span', Html::tag('span', Html::encode($this->label), ['class' => 'visually-hidden']), $this->options);
    }
}
