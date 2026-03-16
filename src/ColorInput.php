<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

/**
 * ColorInput widget renders a set of color selection inputs.
 */
class ColorInput extends Widget
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
     * @var array the selection items. Key is the value/color name, value is the CSS color (e.g., 'primary', 'blue', 'red') or a label.
     */
    public $items = [];

    /**
     * @var bool whether to allow multiple selection
     */
    public $multiple = false;

    /**
     * @var bool whether to use rounded variation
     */
    public $rounded = false;

    /**
     * @var array HTML attributes for the container tag
     */
    public $options = [];

    public function init(): void
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'row g-2']);
    }

    public function run()
    {
        $content = '';
        foreach ($this->items as $val => $color) {
            $content .= Html::tag('div', $this->renderItem($val, $color), ['class' => 'col-auto']);
        }

        return Html::tag('div', $content, $this->options);
    }

    protected function renderItem($val, $color)
    {
        $inputOptions = [
            'value' => $val,
            'class' => 'form-colorinput-input'
        ];

        $checked = false;
        if ($this->multiple) {
            if (is_array($this->value) && in_array($val, $this->value)) {
                $checked = true;
            }
        } else {
            if ($this->value == $val) {
                $checked = true;
            }
        }

        $input = $this->multiple
            ? Html::checkbox($this->name, $checked, $inputOptions)
            : Html::radio($this->name, $checked, $inputOptions);

        $colorClass = "bg-{$color}";
        if ($this->rounded) {
            $colorClass .= " rounded-circle";
        }

        $colorSpan = Html::tag('span', '', ['class' => "form-colorinput-color {$colorClass}"]);

        return Html::tag('label', $input . $colorSpan, ['class' => 'form-colorinput']);
    }
}
