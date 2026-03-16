<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;


/**
 * Tag widget renders a Tabler tag.
 */
class Tag extends Widget
{
    /**
     * @var string the tag content
     */
    public $content;

    /**
     * @var string background color (e.g., 'blue', 'red')
     */
    public $color;

    /**
     * @var bool whether the tag is rounded-pill
     */
    public $pill = false;

    /**
     * @var bool whether the tag has a close button
     */
    public $isDismissible = false;

    /**
     * @var array HTML attributes for the tag container
     */
    public $options = [];

    /**
     * @var string alias for content
     */
    public $label;

    /**
     * @var string alias for content
     */
    public $text;

    public function init(): void
    {
        parent::init();
        if ($this->label !== null) {
            $this->content = $this->label;
        }
        if ($this->text !== null) {
            $this->content = $this->text;
        }

        Html::addCssClass($this->options, ['widget' => 'tag']);

        if ($this->color) {
            Html::addCssClass($this->options, ['color' => 'bg-' . $this->color]);
        }

        if ($this->pill) {
            Html::addCssClass($this->options, ['pill' => 'rounded-pill']);
        }
    }

    public function run()
    {
        $content = $this->content;

        if ($this->isDismissible) {
            $content .= Html::a('', '#', ['class' => 'btn-close']);
        }

        return Html::tag('span', $content, $this->options);
    }
}
