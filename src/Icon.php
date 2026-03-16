<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;


/**
 * Icon widget renders a Tabler icon.
 *
 * Usage:
 * ```php
 * echo Icon::widget(['name' => 'home']);
 * ```
 */
class Icon extends Widget
{
    /**
     * @var string the icon name (e.g. 'home', 'user')
     */
    public $name;

    /**
     * @var array HTML attributes for the icon tag
     */
    public $options = [];

    /**
     * @inheritDoc
     */
    public function run(): string
    {
        if ($this->name === null) {
            return '';
        }

        $options = $this->options;
        if (strpos($this->name, 'ti-') !== 0) {
            Html::addCssClass($options, 'ti');
            Html::addCssClass($options, 'ti-' . $this->name);
        } else {
            Html::addCssClass($options, $this->name);
        }
        Html::addCssClass($options, 'icon');

        return Html::tag('i', '', $options);
    }
}
