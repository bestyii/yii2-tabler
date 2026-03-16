<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;


/**
 * ImageCheck widget renders a set of image selection inputs.
 */
class ImageCheck extends Widget
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
     * @var array the selection items. Each item should be an array with:
     * - value: mixed, the input value
     * - image: string, the image URL
     * - alt: string, the image alt text
     * - col: string, the column class (default: 'col-6 col-sm-4')
     */
    public $items = [];

    /**
     * @var bool whether to allow multiple selection
     */
    public $multiple = false;

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
        foreach ($this->items as $item) {
            $content .= $this->renderItem($item);
        }

        return Html::tag('div', $content, $this->options);
    }

    protected function renderItem($item)
    {
        $val = $item['value'] ?? null;
        $image = $item['image'] ?? null;
        $alt = $item['alt'] ?? '';
        $colClass = $item['col'] ?? 'col-6 col-sm-4';

        $inputOptions = [
            'value' => $val,
            'class' => 'form-imagecheck-input'
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

        $imageTag = Html::img($image, ['alt' => $alt, 'class' => 'form-imagecheck-image']);
        $figure = Html::tag('span', $imageTag, ['class' => 'form-imagecheck-figure']);

        $label = Html::tag('label', $input . $figure, ['class' => 'form-imagecheck mb-2']);

        return Html::tag('div', $label, ['class' => $colClass]);
    }
}
