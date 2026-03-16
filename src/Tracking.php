<?php

namespace bestyii\tabler;

use yii\helpers\Html;

/**
 * Tracking widget renders a tracking component for visualizing activity logs.
 */
class Tracking extends Widget
{
    /**
     * @var array the tracking blocks. Each item should be an array with:
     * - color: string, the background color (e.g., 'success', 'danger', 'warning')
     * - tooltip: string, the tooltip text
     * - options: array, additional HTML attributes for the block
     */
    public $items = [];

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = '';
        foreach ($this->items as $item) {
            $content .= $this->renderBlock($item) . "\n";
        }

        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'tracking']);
    }

    protected function renderBlock($item)
    {
        $options = $item['options'] ?? [];
        Html::addCssClass($options, 'tracking-block');

        $color = $item['color'] ?? null;
        if ($color) {
            Html::addCssClass($options, "bg-{$color}");
        }

        $tooltip = $item['tooltip'] ?? null;
        if ($tooltip) {
            $options['data-bs-toggle'] = 'tooltip';
            $options['data-bs-placement'] = 'top';
            $options['title'] = $tooltip;
        }

        return Html::tag('div', '', $options);
    }
}
