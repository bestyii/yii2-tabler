<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Steps extends Widget
{
    public array $items = [];
    public bool $vertical = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'steps');
        if ($this->vertical) {
            Html::addCssClass($this->options, 'steps-vertical');
        }

        $items = [];
        foreach ($this->items as $index => $item) {
            $item = (array) $item;
            $itemOptions = (array) ($item['options'] ?? []);
            Html::addCssClass($itemOptions, 'step-item');

            if (!empty($item['completed'])) {
                Html::addCssClass($itemOptions, 'completed');
            }
            if (!empty($item['active'])) {
                Html::addCssClass($itemOptions, 'active');
            }

            $indicator = !empty($item['icon'])
                ? Icon::widget([
                    'name' => (string) $item['icon'],
                    'options' => [
                        'class' => 'step-icon',
                    ],
                ])
                : Html::tag('span', (string) ($item['number'] ?? ($index + 1)), [
                    'class' => 'step-number',
                ]);

            $body = Html::tag('div', Html::encode((string) ($item['label'] ?? '')), [
                'class' => 'step-title',
            ]);
            if (($item['description'] ?? '') !== '') {
                $body .= Html::tag('div', Html::encode((string) $item['description']), [
                    'class' => 'step-description text-secondary',
                ]);
            }

            $content = Html::tag('span', $indicator, [
                'class' => 'step-indicator',
            ]);
            $content .= Html::tag('div', $body, [
                'class' => 'step-body',
            ]);

            $items[] = Html::tag('div', $content, $itemOptions);
        }

        return Html::tag('div', implode("\n", $items), $this->options);
    }
}
