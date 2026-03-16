<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Skeleton extends Widget
{
    /**
     * @var string the type of skeleton placeholder: 'image', 'avatar', 'text', 'line'
     */
    public $type = 'line';

    /**
     * @var string|bool animation type: 'glow', 'wave' or false
     */
    public $animation = 'glow';

    /**
     * @var string size of the placeholder: 'xs', 'sm', 'lg'
     */
    public $size;

    /**
     * @var string grid column width (e.g. '6', '12', 'col-9')
     */
    public $width;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = '';
        if ($this->type === 'image') {
            $content = \bestyii\tabler\Icon::widget(['name' => 'photo']);
        }

        $html = Html::tag($this->type === 'avatar' ? 'span' : 'div', $content, $this->options);

        if ($this->animation) {
            $containerOptions = ['class' => 'placeholder-' . $this->animation];
            return Html::tag('div', $html, $containerOptions);
        }

        return $html;
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'placeholder']);

        if ($this->type === 'image') {
            Html::addCssClass($this->options, ['type' => 'placeholder-image']);
        } elseif ($this->type === 'avatar') {
            Html::addCssClass($this->options, ['type' => 'avatar placeholder']);
        }

        if ($this->size) {
            Html::addCssClass($this->options, ['size' => 'placeholder-' . $this->size]);
        }

        if ($this->width) {
            $colClass = strpos($this->width, 'col-') === 0 ? $this->width : 'col-' . $this->width;
            Html::addCssClass($this->options, $colClass);
        }
    }
}
