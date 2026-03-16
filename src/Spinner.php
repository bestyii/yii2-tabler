<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Spinner extends Widget
{
    /**
     * @var string spinner type: 'border', 'grow', 'dots'
     */
    public $type = 'border';

    /**
     * @var string color class (e.g. 'primary', 'success', 'danger')
     */
    public $color;

    /**
     * @var string size (e.g. 'sm')
     */
    public $size;

    /**
     * @var bool whether to center the spinner
     */
    public $centered = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $spinnerHtml = '';

        if ($this->type === 'dots') {
            $spinnerHtml = Html::tag('span', '', $this->options);
        } else {
            $hiddenText = Html::tag('span', \Yii::t('yii', 'Loading...'), ['class' => 'visually-hidden']);
            $spinnerHtml = Html::tag('div', $hiddenText, $this->options);
        }

        if ($this->centered) {
            return Html::tag('div', $spinnerHtml, ['class' => 'text-center']);
        }

        return $spinnerHtml;
    }

    protected function initOptions(): void
    {
        if ($this->type === 'dots') {
            Html::addCssClass($this->options, ['widget' => 'animated-dots']);
        } else {
            Html::addCssClass($this->options, ['widget' => 'spinner-' . $this->type]);
            if ($this->size) {
                Html::addCssClass($this->options, ['size' => 'spinner-' . $this->type . '-' . $this->size]);
            }
            if ($this->color) {
                Html::addCssClass($this->options, ['color' => 'text-' . $this->color]);
            }
            $this->options['role'] = 'status';
        }
    }
}
