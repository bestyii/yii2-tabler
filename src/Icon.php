<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\TablerIconsAsset;
use yii\helpers\Html;

class Icon extends Widget
{
    public string $name = '';
    public string $tag = 'i';
    public array $options = [];

    public function run(): string
    {
        if ($this->name === '') {
            return '';
        }

        TablerIconsAsset::register($this->getView());
        Html::addCssClass($this->options, ['icon' => 'ti', 'icon-name' => 'ti-' . $this->name]);

        return Html::tag($this->tag, '', $this->options);
    }
}
