<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Timeline extends Widget
{
    public array $items = [];
    public bool $simple = false;
    public bool $encode = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'timeline');
        if ($this->simple) {
            Html::addCssClass($this->options, 'timeline-simple');
        }

        $items = [];
        foreach ($this->items as $item) {
            $items[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }

    private function renderItem(array $item): string
    {
        $iconOptions = ['class' => 'timeline-event-icon'];
        if (!empty($item['iconColor'])) {
            Html::addCssClass($iconOptions, 'bg-' . $item['iconColor'] . '-lt');
        }

        $time = (string) ($item['time'] ?? '');
        $title = (string) ($item['title'] ?? '');
        $description = (string) ($item['description'] ?? '');
        $content = $item['content'] ?? null;
        $encode = (bool) ($item['encode'] ?? $this->encode);

        $body = '';
        if ($time !== '') {
            $body .= Html::tag('div', Html::encode($time), ['class' => 'text-secondary float-end']);
        }
        if ($title !== '') {
            $body .= Html::tag('h4', $encode ? Html::encode($title) : $title);
        }
        if ($description !== '') {
            $body .= Html::tag('p', $encode ? Html::encode($description) : $description, ['class' => 'text-secondary']);
        }
        if ($content !== null && $content !== '') {
            $body .= (string) $content;
        }

        $card = Html::tag('div', Html::tag('div', $body, ['class' => 'card-body']), ['class' => 'card timeline-event-card']);
        $icon = Html::tag('div', Icon::widget(['name' => (string) ($item['icon'] ?? 'circle')]), $iconOptions);

        return Html::tag('li', $icon . $card, ['class' => 'timeline-event']);
    }
}
