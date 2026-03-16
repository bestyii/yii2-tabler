<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Avatar extends Widget
{
    /**
     * @var string URL to the image
     */
    public $url;

    /**
     * @var string initials to show when no image
     */
    public $initials;

    /**
     * @var string size of the avatar: 'xs', 'sm', 'md', 'lg', 'xl'
     */
    public $size;

    /**
     * @var string shape of the avatar: 'circle' or 'rounded' (default is rounded)
     */
    public $shape;

    /**
     * @var string background color (e.g. 'primary', 'success')
     */
    public $color;

    /**
     * @var string tabler icon name to display instead of initials or image
     */
    public $icon;

    /**
     * @var array HTML attributes for the avatar container
     */
    public $options = [];

    /**
     * @var string initials (alias for initials)
     */
    public $text;

    /**
     * @var string image url (alias for url)
     */
    public $src;

    /**
     * @var bool whether to use lite variation for background color (default is true if color is set)
     */
    public $lite = true;

    /**
     * @var string the color of the status dot (e.g., 'success', 'danger')
     */
    public $status;

    /**
     * @var array HTML attributes for the status dot
     */
    public $statusOptions = [];

    /**
     * @var bool whether the avatar is part of a stacked list
     */
    public $stacked = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = '';

        if (!$this->url) {
            if ($this->icon) {
                $content = \bestyii\tabler\Icon::widget(['name' => $this->icon]);
            } elseif ($this->initials) {
                $content = Html::encode($this->initials);
            }
        }

        if ($this->status) {
            Html::addCssClass($this->statusOptions, ['widget' => 'badge']);
            $classValue = ArrayHelper::getValue($this->statusOptions, 'class', '');
            $classString = is_array($classValue) ? implode(' ', $classValue) : $classValue;
            if (strpos($classString, 'bg-') === false) {
                Html::addCssClass($this->statusOptions, ['color' => 'bg-' . $this->status]);
            }
            $content .= Html::tag('span', '', $this->statusOptions);
        }

        return Html::tag('span', $content, $this->options);
    }

    protected function initOptions(): void
    {
        if ($this->text !== null) {
            $this->initials = $this->text;
        }
        if ($this->src !== null) {
            $this->url = $this->src;
        }

        Html::addCssClass($this->options, ['widget' => 'avatar']);

        if ($this->size) {
            Html::addCssClass($this->options, ['size' => 'avatar-' . $this->size]);
        }

        if ($this->shape === 'circle') {
            Html::addCssClass($this->options, ['shape' => 'rounded-circle']);
        }

        if ($this->color) {
            $class = $this->lite ? "bg-{$this->color}-lt" : "bg-{$this->color}";
            Html::addCssClass($this->options, ['color' => $class]);
        }

        if ($this->stacked) {
            Html::addCssClass($this->options, ['stacked' => 'avatar-stacked']);
        }

        if ($this->url) {
            $style = ArrayHelper::getValue($this->options, 'style', '');
            $this->options['style'] = trim($style . '; background-image: url(' . $this->url . ')', '; ');
        }
    }
}
