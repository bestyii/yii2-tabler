<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\TablerIconsAsset;
use yii\helpers\Html;

class Icon extends Widget
{
    public string $name = '';
    public string $tag = 'i';
    public ?string $size = null;
    public array $options = [];

    public function run(): string
    {
        if ($this->name === '') {
            return '';
        }

        TablerIconsAsset::register($this->getView());
        Html::addCssClass($this->options, ['icon' => 'ti', 'icon-name' => 'ti-' . $this->name]);
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, 'icon-' . $this->size);
        }

        return Html::tag($this->tag, '', $this->options);
    }
}
