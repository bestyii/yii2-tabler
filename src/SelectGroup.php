<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;
use yii\base\InvalidConfigException;

use yii\helpers\ArrayHelper;

/**
 * SelectGroup widget renders a group of radio buttons or checkboxes styled as tags/buttons.
 */
class SelectGroup extends Widget
{
    /**
     * @var string the input name
     */
    public $name = '';

    /**
     * @var string|array the selected value(s)
     */
    public $value;

    /**
     * @var array the selection items. The key is the value, and the value is the label.
     * The label can also be an array with keys 'label', 'icon', and 'description'.
     */
    public $items = [];

    /**
     * @var bool whether to allow multiple selection (checkboxes instead of radios)
     */
    public $multiple = false;

    /**
     * @var bool whether to allow selecting multiple items as a group of buttons (form-selectgroup-boxes)
     */
    public $isBoxes = false;

    /**
     * @var bool whether to use small variation
     */
    public $size;

    /**
     * @var array HTML attributes for the container tag
     */
    public $options = [];

    /**
     * @var array HTML attributes for the input tags
     */
    public $inputOptions = [];

    public function init(): void
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'form-selectgroup']);
        if ($this->multiple) {
            Html::addCssClass($this->options, ['type' => 'form-selectgroup-pills']);
        }
    }

    public function run()
    {
        $content = '';
        foreach ($this->items as $value => $item) {
            $content .= $this->renderItem($value, $item);
        }

        return Html::tag('div', $content, $this->options);
    }

    protected function renderItem($value, $item)
    {
        $label = $item;
        $icon = null;
        $description = null;

        if (is_array($item)) {
            $label = ArrayHelper::getValue($item, 'label', '');
            $icon = ArrayHelper::getValue($item, 'icon');
            $description = ArrayHelper::getValue($item, 'description');
        }

        $inputOptions = $this->inputOptions;
        $inputOptions['value'] = $value;
        $inputOptions['class'] = 'form-selectgroup-input';

        $checked = false;
        if ($this->multiple) {
            if (is_array($this->value) && in_array($value, $this->value)) {
                $checked = true;
            }
        } else {
            if ($this->value == $value) {
                $checked = true;
            }
        }

        $input = $this->multiple
            ? Html::checkbox($this->name, $checked, $inputOptions)
            : Html::radio($this->name, $checked, $inputOptions);

        $labelContent = '';
        if ($icon) {
            $labelContent .= \bestyii\tabler\Icon::widget(['name' => $icon, 'options' => ['class' => 'icon me-1']]);
        }
        $labelContent .= Html::encode($label);

        if ($description) {
            $labelContent .= Html::tag('div', Html::encode($description), ['class' => 'form-selectgroup-label-description']);
        }

        $finalLabel = Html::tag('span', $labelContent, ['class' => 'form-selectgroup-label']);

        return Html::tag('label', $input . $finalLabel, ['class' => 'form-selectgroup-item']);
    }
}
