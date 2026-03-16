<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Ribbon extends Widget
{
    /**
     * @var string the text to display in the ribbon
     */
    public $text;

    /**
     * @var string ribbon status color (e.g. 'primary', 'success', 'danger')
     */
    public $color;

    /**
     * @var string ribbon position: 'top', 'bottom', 'left', 'right', 'bookmark'
     */
    public $position = 'top';

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        return Html::tag('div', $this->text, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'ribbon']);
        if ($this->color) {
            Html::addCssClass($this->options, ['color' => 'bg-' . $this->color]);
        }
        if ($this->position !== 'top') {
            Html::addCssClass($this->options, ['position' => 'ribbon-' . $this->position]);
        }
    }
}
