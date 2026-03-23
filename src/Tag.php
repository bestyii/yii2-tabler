<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Tag extends Widget
{
    public string $label = '';
    public ?string $icon = null;
    public ?string $color = null;
    public bool $lite = true;
    public bool $rounded = true;
    public bool $removable = false;
    public ?string $url = null;
    public bool $encodeLabel = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'tag');
        if ($this->rounded) {
            Html::addCssClass($this->options, 'rounded-pill');
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, $this->lite ? 'bg-' . $this->color . '-lt' : 'bg-' . $this->color);
        }

        $content = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        if ($this->icon !== null && $this->icon !== '') {
            $content = Icon::widget([
                'name' => $this->icon,
                'options' => [
                    'class' => 'me-1',
                ],
            ]) . $content;
        }

        if ($this->removable) {
            $content .= Html::button('', [
                'type' => 'button',
                'class' => 'btn-close ms-2',
                'aria-label' => 'Remove',
            ]);
        }

        if ($this->url !== null && $this->url !== '') {
            return Html::a($content, $this->url, $this->options);
        }

        return Html::tag('span', $content, $this->options);
    }
}
