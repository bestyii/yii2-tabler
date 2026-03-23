<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Trending extends Widget
{
    public int|float $value = 0;
    public int $precision = 0;
    public string $suffix = '%';
    public array $options = [];

    public function run(): string
    {
        $color = 'muted';
        $icon = 'minus';
        if ($this->value > 0) {
            $color = 'green';
            $icon = 'arrow-up';
        } elseif ($this->value < 0) {
            $color = 'red';
            $icon = 'arrow-down';
        }

        Html::addCssClass($this->options, ['text-' . $color, 'd-inline-flex', 'align-items-center', 'lh-1']);

        $formatted = number_format((float) $this->value, $this->precision);
        $content = Html::encode($formatted . $this->suffix . ' ')
            . Icon::widget([
                'name' => $icon,
                'size' => 'sm',
                'options' => [
                    'class' => 'ms-0',
                ],
            ]);

        return Html::tag('span', $content, $this->options);
    }
}
