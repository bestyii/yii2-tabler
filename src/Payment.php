<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Payment extends Widget
{
    public string $provider = 'visa';
    public ?string $size = null;
    public bool $dark = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'payment');
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, 'payment-' . $this->size);
        }

        $providerClass = 'payment-provider-' . $this->provider;
        if ($this->dark) {
            $providerClass .= '-dark';
        }
        Html::addCssClass($this->options, $providerClass);

        return Html::tag('span', '', $this->options);
    }
}
