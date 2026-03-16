<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

class Datagrid extends Widget
{
    /**
     * @var array list of items to display.
     * Each item can be an array with 'title' and 'value', e.g.:
     * [['title' => 'First Name', 'value' => 'John'], ['title' => 'Last Name', 'value' => 'Doe']]
     */
    public $items = [];

    /**
     * @var array HTML attributes for the datagrid container
     */
    public $options = [];

    public function init(): void
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'datagrid']);
    }

    public function run()
    {
        $content = '';
        foreach ($this->items as $item) {
            $title = ArrayHelper::getValue($item, 'title', '');
            $value = ArrayHelper::getValue($item, 'value', '');

            $itemOptions = ArrayHelper::getValue($item, 'options', []);
            Html::addCssClass($itemOptions, ['widget' => 'datagrid-item']);

            $titleHtml = Html::tag('div', $title, ['class' => 'datagrid-title']);
            $valueHtml = Html::tag('div', $value, ['class' => 'datagrid-content']);

            $content .= Html::tag('div', $titleHtml . "\n" . $valueHtml, $itemOptions) . "\n";
        }

        return Html::tag('div', $content, $this->options);
    }
}
