<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Tracking extends Widget
{
    public array $blocks = [];
    public bool $squares = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'tracking');
        if ($this->squares) {
            Html::addCssClass($this->options, 'tracking-squares');
        }

        $blocks = [];
        foreach ($this->blocks as $block) {
            $blockOptions = [
                'class' => 'tracking-block',
            ];
            if (!empty($block['status'])) {
                Html::addCssClass($blockOptions, 'bg-' . $block['status']);
            }
            if (!empty($block['title'])) {
                $blockOptions['title'] = (string) $block['title'];
                $blockOptions['data-bs-toggle'] = 'tooltip';
                $blockOptions['data-bs-placement'] = 'top';
            }
            $blocks[] = Html::tag('div', '', $blockOptions);
        }

        return Html::tag('div', implode("\n", $blocks), $this->options);
    }
}
