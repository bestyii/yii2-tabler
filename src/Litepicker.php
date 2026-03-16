<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\LitepickerAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class Litepicker extends InputWidget
{
    /**
     * @var array Litepicker plugin configuration options.
     * @see https://litepicker.com/docs/options
     */
    public $pluginOptions = [];

    public function init(): void
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'form-control']);
    }

    public function run()
    {
        $this->registerClientScript();

        // wrap in an input-icon for better styling
        $input = $this->hasModel()
            ? Html::activeTextInput($this->model, $this->attribute, $this->options)
            : Html::textInput($this->name, $this->value, $this->options);

        $icon = Html::tag('span', \bestyii\tabler\Icon::widget(['name' => 'calendar']), ['class' => 'input-icon-addon']);

        return Html::tag('div', $input . "\n" . $icon, ['class' => 'input-icon']);
    }

    protected function registerClientScript()
    {
        $view = $this->getView();
        LitepickerAsset::register($view);
        $id = $this->options['id'];

        $defaultOptions = [
            'element' => new \yii\web\JsExpression("document.getElementById('{$id}')"),
            'buttonText' => [
                'previousMonth' => \bestyii\tabler\Icon::widget(['name' => 'chevron-left']),
                'nextMonth' => \bestyii\tabler\Icon::widget(['name' => 'chevron-right']),
            ]
        ];

        $options = array_merge($defaultOptions, $this->pluginOptions);
        $optionsJson = Json::htmlEncode($options);

        $js = "new Litepicker({$optionsJson});";
        $view->registerJs($js);
    }
}
