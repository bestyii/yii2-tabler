<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

/**
 * DividedList renders a list of items separated by dividers, often used inside Cards.
 */
class DividedList extends Widget
{
    /**
     * @var array list of items to render. Each item can be a string or an array:
     * - 'content' => string (required)
     * - 'options' => array (HTML attributes for the item container)
     */
    public $items = [];

    /**
     * @var array HTML attributes for the list container
     */
    public $options = [];

    /**
     * @var string the CSS class for dividers. Defaults to 'divide-y'.
     */
    public $dividerClass = 'divide-y';

    public function init(): void
    {
        parent::init();
        Html::addCssClass($this->options, $this->dividerClass);
    }

    public function run()
    {
        if (empty($this->items)) {
            return '';
        }

        $lines = [];
        foreach ($this->items as $item) {
            if (is_string($item)) {
                $content = $item;
                $options = [];
            } else {
                $content = ArrayHelper::getValue($item, 'content', '');
                $options = ArrayHelper::getValue($item, 'options', []);
            }
            $lines[] = Html::tag('div', $content, $options);
        }

        return Html::tag('div', implode("\n", $lines), $this->options);
    }
}
