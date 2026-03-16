<?php

namespace bestyii\tabler;

use yii\helpers\Html;

/**
 * StatusDot widget renders a status dot without text.
 */
class StatusDot extends Widget
{
    /**
     * @var string the status color
     */
    public $color = 'primary';

    /**
     * @var bool whether the dot should be animated
     */
    public $animated = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run(): string
    {
        return Html::tag('span', '', $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'status-dot']);
        if ($this->color) {
            Html::addCssClass($this->options, ['color' => "status-{$this->color}"]);
        }
        if ($this->animated) {
            Html::addCssClass($this->options, ['animated' => 'status-dot-animated']);
        }
    }
}
