<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;


class Badge extends Widget
{
    /**
     * @var string the text or HTML to display within the badge
     */
    public $content;

    /**
     * @var string background color (e.g. 'primary', 'success', 'danger')
     */
    public $color;

    /**
     * @var string styling type: 'outline' or 'pill'
     */
    public $type;

    /**
     * @var string icon name
     */
    public $icon;

    /**
     * @var bool whether it is an empty dot badge (often used for status)
     */
    public $isDot = false;

    /**
     * @var string URL. If passed, the badge will render as an `<a>` tag
     */
    public $url;

    /**
     * @var array HTML attributes for the badge
     */
    public $options = [];

    /**
     * @var string alias for content
     */
    public $text;

    /**
     * @var bool whether it is an outline badge
     */
    public $outline;

    /**
     * @var bool whether it is a pill badge
     */
    public $pill;

    /**
     * @var bool whether it is a dot badge
     */
    public $dot;

    /**
     * @var bool whether it is a lite (light) variation
     */
    public $lite = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = $this->content;
        if ($this->icon) {
            $content = \bestyii\tabler\Icon::widget(['name' => $this->icon, 'options' => ['class' => 'badge-icon']]) . $content;
        }

        if ($this->url) {
            return Html::a($content, $this->url, $this->options);
        }
        return Html::tag('span', $content, $this->options);
    }

    protected function initOptions(): void
    {
        if ($this->text !== null) {
            $this->content = $this->text;
        }
        if ($this->dot !== null) {
            $this->isDot = $this->dot;
        }
        if ($this->outline === true) {
            $this->type = 'outline';
        }
        if ($this->pill === true) {
            $this->type = 'pill';
        }

        Html::addCssClass($this->options, ['widget' => 'badge']);

        if ($this->isDot) {
            Html::addCssClass($this->options, ['dot' => 'badge-dot']);
        }

        if ($this->color) {
            if ($this->type === 'outline') {
                Html::addCssClass($this->options, ['color' => 'badge-outline text-' . $this->color]);
            } elseif ($this->lite) {
                Html::addCssClass($this->options, ['color' => 'bg-' . $this->color . '-lt']);
            } else {
                Html::addCssClass($this->options, ['color' => 'bg-' . $this->color]);
            }
        }

        if ($this->type === 'pill') {
            Html::addCssClass($this->options, ['pill' => 'badge-pill']);
        }
    }
}
