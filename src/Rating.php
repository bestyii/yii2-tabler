<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Rating extends Widget
{
    public float $value = 0.0;
    public int $max = 5;
    public string $filledIcon = 'star-filled';
    public string $emptyIcon = 'star';
    public string $color = 'yellow';
    public bool $showValue = false;
    public string $valueFormat = '%1$.1f/%2$d';
    public array $options = [];
    public array $itemOptions = [];
    public array $valueOptions = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'd-inline-flex align-items-center gap-1');
        Html::addCssClass($this->valueOptions, 'small text-secondary ms-1');

        $content = [];
        $filled = max(0, min($this->max, (int) round($this->value)));

        for ($position = 1; $position <= $this->max; $position++) {
            $iconOptions = $this->itemOptions;
            Html::addCssClass($iconOptions, $position <= $filled ? 'text-' . $this->color : 'text-secondary');

            $content[] = Icon::widget([
                'name' => $position <= $filled ? $this->filledIcon : $this->emptyIcon,
                'options' => $iconOptions,
            ]);
        }

        if ($this->showValue) {
            $content[] = Html::tag('span', sprintf($this->valueFormat, $this->value, $this->max), $this->valueOptions);
        }

        return Html::tag('div', implode('', $content), $this->options);
    }
}
