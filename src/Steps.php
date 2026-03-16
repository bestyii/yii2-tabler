<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;


class Steps extends Widget
{
    /**
     * @var array list of steps to display. Each item should have 'title', optionally 'subtitle', 'icon', 'active', 'options'
     * e.g. [['title' => 'Step 1', 'active' => true], ['title' => 'Step 2']]
     */
    public $items = [];

    /**
     * @var string visual style: 'counter' or 'color' (color creates line colors based on status)
     */
    public $type = 'color';

    /**
     * @var string the color class to use (e.g. 'primary', 'green')
     */
    public $color;

    /**
     * @var array HTML attributes for the steps container
     */
    public $options = [];

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = '';

        foreach ($this->items as $index => $item) {
            $content .= $this->renderItem($index, $item);
        }

        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'steps']);

        if ($this->type === 'counter') {
            Html::addCssClass($this->options, ['type' => 'steps-counter']);
        }

        if ($this->color) {
            Html::addCssClass($this->options, ['color' => 'steps-' . $this->color]);
        }
    }

    protected function renderItem($index, $item)
    {
        $itemOptions = ArrayHelper::getValue($item, 'options', []);
        Html::addCssClass($itemOptions, ['widget' => 'step-item']);

        if (ArrayHelper::getValue($item, 'active')) {
            Html::addCssClass($itemOptions, ['active' => 'active']);
        }

        $tag = 'span';
        if (isset($item['url'])) {
            $tag = 'a';
            $itemOptions['href'] = $item['url'];
        }

        $tooltip = ArrayHelper::getValue($item, 'tooltip');
        if ($tooltip) {
            $itemOptions['data-bs-toggle'] = 'tooltip';
            $itemOptions['data-bs-placement'] = 'top';
            $itemOptions['title'] = $tooltip;
        }

        $title = ArrayHelper::getValue($item, 'title', '');
        $subtitle = ArrayHelper::getValue($item, 'subtitle');

        $itemHtml = Html::encode($title);
        if ($subtitle) {
            $itemHtml = Html::tag('div', $itemHtml) . Html::tag('div', Html::encode($subtitle), ['class' => 'text-muted sm']);
        }

        return Html::tag($tag, $itemHtml, $itemOptions);
    }
}
