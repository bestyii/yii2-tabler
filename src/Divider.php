<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;


/**
 * Divider widget renders a horizontal or vertical divider line.
 */
class Divider extends Widget
{
    /**
     * @var string the text to display in the middle of the divider
     */
    public $text = '';

    /**
     * @var string the text position: 'left', 'center', 'right'
     */
    public $position = 'center';

    /**
     * @var bool whether the divider is vertical
     */
    public $vertical = false;

    /**
     * @var array HTML attributes for the divider container
     */
    public $options = [];

    public function init(): void
    {
        parent::init();
        if ($this->vertical) {
            Html::addCssClass($this->options, ['widget' => 'hr-vertical']);
        } else {
            Html::addCssClass($this->options, ['widget' => 'hr']);
            if ($this->text) {
                Html::addCssClass($this->options, ['text' => 'hr-text']);
                if ($this->position === 'left') {
                    Html::addCssClass($this->options, ['position' => 'hr-text-left']);
                } elseif ($this->position === 'right') {
                    Html::addCssClass($this->options, ['position' => 'hr-text-right']);
                }
            }
        }
    }

    public function run()
    {
        return Html::tag('div', Html::encode($this->text), $this->options);
    }
}
