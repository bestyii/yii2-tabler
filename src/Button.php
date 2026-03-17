<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Button extends Widget
{
    public string $label = 'Button';
    public ?string $icon = null;
    public ?string $url = null;
    public string $color = 'primary';
    public bool $outline = false;
    public ?string $size = null;
    public bool $encodeLabel = true;
    public array $options = [];

    public function run(): string
    {
        $classes = ['btn'];
        $classes[] = $this->outline ? 'btn-outline-' . $this->color : 'btn-' . $this->color;
        if ($this->size !== null) {
            $classes[] = 'btn-' . $this->size;
        }

        Html::addCssClass($this->options, $classes);

        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        if ($this->icon !== null && $this->icon !== '') {
            $label = Icon::widget([
                'name' => $this->icon,
                'options' => ['class' => 'me-1'],
            ]) . $label;
        }

        if ($this->url !== null) {
            return Html::a($label, $this->url, $this->options);
        }

        $this->options['type'] ??= 'button';
        return Html::tag('button', $label, $this->options);
    }
}
