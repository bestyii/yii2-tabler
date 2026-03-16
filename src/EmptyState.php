<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class EmptyState extends Widget
{
    /**
     * @var string the title of the empty state
     */
    public $title;

    /**
     * @var string the subtitle or description
     */
    public $subtitle;

    /**
     * @var string the icon name (tabler icon name)
     */
    public $icon;

    /**
     * @var string image url to use instead of an icon
     */
    public $image;

    /**
     * @var string the button text
     */
    public $buttonText;

    /**
     * @var array|string the button link url
     */
    public $buttonLink;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = '';

        if ($this->image) {
            $content .= Html::tag('div', Html::img($this->image, ['height' => 128, 'class' => 'mb-4']), ['class' => 'empty-img']);
        } elseif ($this->icon) {
            $content .= Html::tag('div', \bestyii\tabler\Icon::widget(['name' => $this->icon]), ['class' => 'empty-icon']);
        }

        if ($this->title) {
            $content .= Html::tag('p', Html::encode($this->title), ['class' => 'empty-title']);
        }

        if ($this->subtitle) {
            $content .= Html::tag('p', Html::encode($this->subtitle), ['class' => 'empty-subtitle text-muted']);
        }

        if ($this->buttonText && $this->buttonLink) {
            $btn = Html::a(
                \bestyii\tabler\Icon::widget(['name' => 'plus']) . ' ' . Html::encode($this->buttonText),
                $this->buttonLink,
                ['class' => 'btn btn-primary']
            );
            $content .= Html::tag('div', $btn, ['class' => 'empty-action']);
        }

        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'empty']);
    }
}
