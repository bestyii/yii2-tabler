<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Spinner extends Widget
{
    public string $type = 'border';
    public ?string $color = null;
    public ?string $size = null;
    public string $label = 'Loading...';
    public array $options = [];

    // Type shortcuts stay thin and delegate to make().
    public static function border(
        ?string $color = null,
        ?string $size = null,
        string $label = 'Loading...',
        array $options = [],
    ): string {
        return static::make('border', $color, $size, $label, $options);
    }

    public static function grow(
        ?string $color = null,
        ?string $size = null,
        string $label = 'Loading...',
        array $options = [],
    ): string {
        return static::make('grow', $color, $size, $label, $options);
    }

    /**
     * Typed alternative to widget([...]) for the spinner case.
     */
    public static function make(
        string $type = 'border',
        ?string $color = null,
        ?string $size = null,
        string $label = 'Loading...',
        array $options = [],
    ): string {
        return static::widget([
            'type' => $type,
            'color' => $color,
            'size' => $size,
            'label' => $label,
            'options' => $options,
        ]);
    }

    public function run(): string
    {
        $class = $this->type === 'grow' ? 'spinner-grow' : 'spinner-border';

        Html::addCssClass($this->options, $class);
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, $class . '-' . $this->size);
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'text-' . $this->color);
        }
        $this->options['role'] = $this->options['role'] ?? 'status';

        return Html::tag('span', Html::tag('span', Html::encode($this->label), [
            'class' => 'visually-hidden',
        ]), $this->options);
    }
}
