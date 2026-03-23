<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Carousel extends Widget
{
    public array $items = [];
    public bool $showIndicators = true;
    public bool $showControls = true;
    public bool $fade = false;
    public array $options = [];
    public array $innerOptions = [];
    public array $indicatorOptions = [];
    public array $controlOptions = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, 'carousel slide');
        if ($this->fade) {
            Html::addCssClass($this->options, 'carousel-fade');
        }
        $this->options['data-bs-ride'] ??= 'carousel';

        Html::addCssClass($this->innerOptions, 'carousel-inner');

        $content = [];
        if ($this->showIndicators) {
            $content[] = $this->renderIndicators();
        }
        $content[] = Html::tag('div', $this->renderItems(), $this->innerOptions);
        if ($this->showControls) {
            $content[] = $this->renderControls();
        }

        return Html::tag('div', implode("\n", array_filter($content)), $this->options);
    }

    private function renderIndicators(): string
    {
        $buttons = [];
        foreach (array_values($this->items) as $index => $item) {
            $options = array_merge($this->indicatorOptions, [
                'type' => 'button',
                'data-bs-target' => '#' . $this->options['id'],
                'data-bs-slide-to' => (string) $index,
                'aria-label' => 'Slide ' . ($index + 1),
            ]);

            if ($index === 0) {
                $options['class'] = trim(($options['class'] ?? '') . ' active');
                $options['aria-current'] = 'true';
            }

            $buttons[] = Html::tag('button', '', $options);
        }

        return Html::tag('div', implode('', $buttons), [
            'class' => 'carousel-indicators',
        ]);
    }

    private function renderItems(): string
    {
        $items = [];
        foreach (array_values($this->items) as $index => $item) {
            $itemOptions = (array) ($item['options'] ?? []);
            Html::addCssClass($itemOptions, 'carousel-item');
            if ($index === 0) {
                Html::addCssClass($itemOptions, 'active');
            }

            $body = (string) ($item['content'] ?? '');
            if (isset($item['caption'])) {
                $body .= Html::tag('div', (string) $item['caption'], [
                    'class' => 'carousel-caption d-none d-md-block',
                ]);
            }

            $items[] = Html::tag('div', $body, $itemOptions);
        }

        return implode("\n", $items);
    }

    private function renderControls(): string
    {
        $previous = Html::tag(
            'button',
            Html::tag('span', '', [
                'class' => 'carousel-control-prev-icon',
                'aria-hidden' => 'true',
            ])
            . Html::tag('span', 'Previous', [
                'class' => 'visually-hidden',
            ]),
            array_merge($this->controlOptions, [
                'class' => trim(($this->controlOptions['class'] ?? '') . ' carousel-control-prev'),
                'type' => 'button',
                'data-bs-target' => '#' . $this->options['id'],
                'data-bs-slide' => 'prev',
            ]),
        );

        $next = Html::tag(
            'button',
            Html::tag('span', '', [
                'class' => 'carousel-control-next-icon',
                'aria-hidden' => 'true',
            ])
            . Html::tag('span', 'Next', [
                'class' => 'visually-hidden',
            ]),
            array_merge($this->controlOptions, [
                'class' => trim(($this->controlOptions['class'] ?? '') . ' carousel-control-next'),
                'type' => 'button',
                'data-bs-target' => '#' . $this->options['id'],
                'data-bs-slide' => 'next',
            ]),
        );

        return $previous . $next;
    }
}
