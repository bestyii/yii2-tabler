<?php

namespace bestyii\tabler;

use bestyii\tabler\assets\TomSelectAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class TomSelect extends InputWidget
{
    /**
     * @var array option data for select options.
     */
    public $items = [];

    /**
     * @var array TomSelect plugin configuration options.
     * @see https://tom-select.js.org/options/
     */
    public $pluginOptions = [];

    public function init(): void
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'form-select']);
    }

    public function run()
    {
        $this->registerClientScript();

        if ($this->hasModel()) {
            return Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        }

        return Html::dropDownList($this->name, $this->value, $this->items, $this->options);
    }

    protected function registerClientScript()
    {
        $view = $this->getView();
        TomSelectAsset::register($view);
        $id = $this->options['id'];
        $options = $this->pluginOptions !== false && !empty($this->pluginOptions) ? Json::htmlEncode($this->pluginOptions) : '{}';

        $js = "new TomSelect('#{$id}', {$options});";
        $view->registerJs($js);
    }
}
