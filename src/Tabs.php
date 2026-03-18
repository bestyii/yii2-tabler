<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Tabs extends Widget
{
    public array $items = [];
    public string $navType = 'nav-tabs';
    public bool $card = false;
    public array $options = [];
    public array $tabContentOptions = [];

    public function run(): string
    {
        Html::addCssClass($this->options, ['nav' => 'nav', $this->navType]);
        if ($this->card) {
            Html::addCssClass($this->options, 'card-header-tabs');
        }
        Html::addCssClass($this->tabContentOptions, 'tab-content');

        $navs = [];
        $panes = [];

        foreach ($this->items as $index => $item) {
            if (!isset($item['label'])) {
                continue;
            }

            $paneOptions = (array) ($item['options'] ?? []);
            $headerOptions = (array) ($item['headerOptions'] ?? []);
            $linkOptions = (array) ($item['linkOptions'] ?? []);

            $paneId = $paneOptions['id'] ?? ($this->getId() . '-tab-' . $index);
            $active = !empty($item['active']);

            Html::addCssClass($headerOptions, 'nav-item');
            Html::addCssClass($linkOptions, 'nav-link');
            Html::addCssClass($paneOptions, 'tab-pane');

            $linkOptions['data-bs-toggle'] = 'tab';
            $linkOptions['href'] = '#' . $paneId;
            $linkOptions['role'] = 'tab';
            $paneOptions['id'] = $paneId;
            $paneOptions['role'] = 'tabpanel';

            if ($active) {
                Html::addCssClass($linkOptions, 'active');
                Html::addCssClass($paneOptions, ['active' => 'active', 'show' => 'show']);
            }

            $navs[] = Html::tag('li', Html::a((string) $item['label'], '#' . $paneId, $linkOptions), $headerOptions);
            $panes[] = Html::tag('div', (string) ($item['content'] ?? ''), $paneOptions);
        }

        return Html::tag('ul', implode("\n", $navs), $this->options) .
            "\n" .
            Html::tag('div', implode("\n", $panes), $this->tabContentOptions);
    }
}
