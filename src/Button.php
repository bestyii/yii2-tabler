<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Button widget for Tabler.
 */
class Button extends Widget
{
    /**
     * @var string the button label
     */
    public $label;

    /**
     * @var string|null the button icon
     */
    public $icon;

    /**
     * @var string|null the button color (e.g. 'primary', 'success')
     */
    public $color;

    /**
     * @var string|null the button size: 'sm', 'lg'
     */
    public $size;

    /**
     * @var bool whether the button is an outline button
     */
    public $outline = false;

    /**
     * @var bool whether the button is a ghost button
     */
    public $ghost = false;

    /**
     * @var bool whether the button is a pill button
     */
    public $pill = false;

    /**
     * @var bool whether the button is a square button
     */
    public $square = false;

    /**
     * @var string|null social media type: 'facebook', 'twitter', 'google', etc.
     */
    public $social;

    /**
     * @var string|null URL for <a> tag buttons
     */
    public $url;

    /**
     * @var string|null the button variant: 'lite', 'icon'
     */
    public $variant;

    /**
     * @var array HTML attributes for the button
     */
    public $options = [];

    /**
     * @var bool whether the button is in loading state
     */
    public $loading = false;

    /**
     * @var bool whether to encode the label. Default is true.
     */
    public $encodeLabel = true;

    /**
     * @var bool whether this is a dropdown toggle button
     */
    public $dropdown = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = '';
        if ($this->icon) {
            $content .= Icon::widget(['name' => $this->icon]);
            if ($this->label !== null && $this->variant !== 'icon') {
                $content .= ' ';
            }
        }

        if ($this->label !== null && $this->variant !== 'icon') {
            $content .= $this->encodeLabel ? Html::encode($this->label) : $this->label;
        }

        if ($this->dropdown) {
            $content .= ' ' . Html::tag('span', '', ['class' => 'dropdown-toggle']);
            $this->options['data-bs-toggle'] = 'dropdown';
            $this->options['aria-expanded'] = 'false';
        }

        if ($this->url) {
            return Html::a($content, $this->url, $this->options);
        }

        return Html::button($content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'btn']);

        if ($this->color) {
            $prefix = $this->outline ? 'btn-outline-' : ($this->ghost ? 'btn-ghost-' : 'btn-');
            Html::addCssClass($this->options, $prefix . $this->color);
        }

        if ($this->size) {
            Html::addCssClass($this->options, 'btn-' . $this->size);
        }

        if ($this->pill) {
            Html::addCssClass($this->options, 'btn-pill');
        }

        if ($this->square) {
            Html::addCssClass($this->options, 'btn-square');
        }

        if ($this->social) {
            Html::addCssClass($this->options, 'btn-' . $this->social);
        }

        if ($this->variant === 'icon') {
            Html::addCssClass($this->options, 'btn-icon');
        }

        if ($this->loading) {
            Html::addCssClass($this->options, 'btn-loading');
        }
    }
}
