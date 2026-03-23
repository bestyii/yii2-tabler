<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\TablerAsset;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

class ToggleButtonGroup extends InputWidget
{
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_RADIO = 'radio';

    public string $type = self::TYPE_RADIO;
    public array $items = [];
    public array $labelOptions = [
        'class' => ['btn', 'btn-outline-secondary'],
    ];
    public bool $encodeLabels = true;

    public function init(): void
    {
        parent::init();
        TablerAsset::register($this->getView());
        Html::addCssClass($this->options, 'btn-group');
        $this->options['role'] ??= 'group';
    }

    /**
     * @throws InvalidConfigException
     */
    public function run(): string
    {
        if (!isset($this->options['item'])) {
            $this->options['item'] = [$this, 'renderItem'];
        }

        return match ($this->type) {
            self::TYPE_CHECKBOX => $this->hasModel()
                ? Html::activeCheckboxList($this->model, $this->attribute, $this->items, $this->options)
                : Html::checkboxList($this->name, $this->value, $this->items, $this->options),
            self::TYPE_RADIO => $this->hasModel()
                ? Html::activeRadioList($this->model, $this->attribute, $this->items, $this->options)
                : Html::radioList($this->name, $this->value, $this->items, $this->options),
            default => throw new InvalidConfigException("Unsupported type '{$this->type}'"),
        };
    }

    public function renderItem(int $index, string $label, string $name, bool $checked, string $value): string
    {
        unset($index);
        $labelOptions = $this->labelOptions;
        $labelOptions['wrapInput'] = false;
        Html::addCssClass($labelOptions, 'btn');

        if ($this->encodeLabels) {
            $label = Html::encode($label);
        }

        $options = [
            'label' => $label,
            'labelOptions' => $labelOptions,
            'autocomplete' => 'off',
            'value' => $value,
            'class' => ['btn-check'],
        ];
        $method = $this->type;

        return Html::$method($name, $checked, $options);
    }
}
