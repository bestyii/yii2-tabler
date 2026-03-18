<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Accordion extends Widget
{
    public array $items = [];
    public bool $flush = false;
    public bool $alwaysOpen = false;
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, 'accordion');
        if ($this->flush) {
            Html::addCssClass($this->options, 'accordion-flush');
        }

        $items = [];
        foreach ($this->items as $index => $item) {
            $item = (array) $item;
            $itemOptions = (array) ($item['options'] ?? []);
            $headerOptions = (array) ($item['headerOptions'] ?? []);
            $bodyOptions = (array) ($item['bodyOptions'] ?? []);
            $buttonOptions = (array) ($item['buttonOptions'] ?? []);
            $collapseOptions = (array) ($item['collapseOptions'] ?? []);

            Html::addCssClass($itemOptions, 'accordion-item');
            Html::addCssClass($headerOptions, 'accordion-header');
            Html::addCssClass($bodyOptions, 'accordion-body');
            Html::addCssClass($collapseOptions, ['accordion-collapse' => 'accordion-collapse', 'collapse' => 'collapse']);
            Html::addCssClass($buttonOptions, 'accordion-button');

            $active = !empty($item['active']);
            if (!$active) {
                Html::addCssClass($buttonOptions, 'collapsed');
            } else {
                Html::addCssClass($collapseOptions, 'show');
            }

            $headingId = $this->options['id'] . '-heading-' . $index;
            $collapseId = $this->options['id'] . '-collapse-' . $index;

            $buttonOptions['type'] = 'button';
            $buttonOptions['data-bs-toggle'] = 'collapse';
            $buttonOptions['data-bs-target'] = '#' . $collapseId;
            $buttonOptions['aria-expanded'] = $active ? 'true' : 'false';
            $buttonOptions['aria-controls'] = $collapseId;

            $collapseOptions['id'] = $collapseId;
            $collapseOptions['aria-labelledby'] = $headingId;
            if (!$this->alwaysOpen) {
                $collapseOptions['data-bs-parent'] = '#' . $this->options['id'];
            }

            $header = Html::tag(
                'h2',
                Html::tag('button', Html::encode((string) ($item['title'] ?? '')), $buttonOptions),
                array_merge($headerOptions, ['id' => $headingId])
            );

            $body = Html::tag(
                'div',
                Html::tag('div', (string) ($item['content'] ?? ''), $bodyOptions),
                $collapseOptions
            );

            $items[] = Html::tag('div', $header . $body, $itemOptions);
        }

        return Html::tag('div', implode("\n", $items), $this->options);
    }
}
