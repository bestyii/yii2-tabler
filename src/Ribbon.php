<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Ribbon extends Widget
{
    public ?string $text = null;
    public ?string $icon = null;
    public ?string $color = null;
    public ?string $placement = null;
    public bool $bookmark = false;
    public bool $encodeText = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'ribbon');

        if ($this->placement !== null && $this->placement !== '') {
            foreach (array_filter(explode('-', $this->placement)) as $modifier) {
                Html::addCssClass($this->options, 'ribbon-' . $modifier);
            }
        }
        if ($this->bookmark) {
            Html::addCssClass($this->options, 'ribbon-bookmark');
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'bg-' . $this->color);
        }

        $content = '';
        if ($this->icon !== null && $this->icon !== '') {
            $content .= Icon::widget([
                'name' => $this->icon,
                'options' => ['class' => $this->text !== null && $this->text !== '' ? 'me-1' : ''],
            ]);
        }
        if ($this->text !== null && $this->text !== '') {
            $content .= $this->encodeText ? Html::encode($this->text) : $this->text;
        }

        if ($content === '') {
            return '';
        }

        return Html::tag('div', $content, $this->options);
    }
}
