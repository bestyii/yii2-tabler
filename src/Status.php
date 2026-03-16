<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Status widget renders a status indicator with a dot and text.
 */
class Status extends Widget
{
    /**
     * @var string the status color
     */
    public $color = '';

    /**
     * @var string the status text
     */
    public $text = '';

    /**
     * @var bool whether to show a dot
     */
    public $dot = true;

    /**
     * @var bool whether to use the lite variation
     */
    public $lite = false;

    /**
     * @var bool whether the dot or indicator should be animated
     */
    public $animated = false;

    /**
     * @var string alias for text
     */
    public $label;

    /**
     * @var bool whether to render as a status indicator (3 circles)
     */
    public $indicator = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        if ($this->indicator) {
            return $this->renderIndicator();
        }

        $content = '';
        if ($this->dot) {
            $dotOptions = ['class' => 'status-dot'];
            if ($this->animated) {
                Html::addCssClass($dotOptions, ['animated' => 'status-dot-animated']);
            }
            $content .= Html::tag('span', '', $dotOptions) . "\n";
        }

        $content .= Html::encode($this->text);

        return Html::tag('span', $content, $this->options);
    }

    protected function initOptions(): void
    {
        if ($this->label !== null) {
            $this->text = $this->label;
        }

        if ($this->indicator) {
            Html::addCssClass($this->options, ['widget' => 'status-indicator']);
            if ($this->animated) {
                Html::addCssClass($this->options, ['animated' => 'status-indicator-animated']);
            }
        } else {
            Html::addCssClass($this->options, ['widget' => 'status']);
            if ($this->lite) {
                Html::addCssClass($this->options, ['lite' => 'status-lite']);
            }
        }

        if ($this->color) {
            $prefix = $this->indicator ? 'status-' : 'status-';
            Html::addCssClass($this->options, ['color' => "status-{$this->color}"]);
        }
    }

    protected function renderIndicator()
    {
        $circles = '';
        for ($i = 0; $i < 3; $i++) {
            $circles .= Html::tag('span', '', ['class' => 'status-indicator-circle']) . "\n";
        }
        return Html::tag('span', $circles, $this->options);
    }
}
