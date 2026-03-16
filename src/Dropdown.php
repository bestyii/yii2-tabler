<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Dropdown extends Widget
{
    /**
     * @var array list of menu items. Each item can be an array with 'label', 'url', 'options', 'linkOptions'
     */
    public $items = [];

    /**
     * @var string visual direction of the dropdown menu: 'start' or 'end'
     */
    public $align; // 'end' puts dropdown-menu-end

    /**
     * @var bool whether the dropdown contains arrows (Tabler specific: dropdown-menu-arrow)
     */
    public $arrow = true;

    /**
     * @var bool whether it's a card style dropdown (Tabler specific: dropdown-menu-card)
     */
    public $card = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        return $this->renderItems($this->items, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'dropdown-menu']);

        if ($this->arrow) {
            Html::addCssClass($this->options, 'dropdown-menu-arrow');
        }

        if ($this->card) {
            Html::addCssClass($this->options, 'dropdown-menu-card');
        }

        if ($this->align === 'end') {
            Html::addCssClass($this->options, 'dropdown-menu-end');
        } elseif ($this->align === 'start') {
            Html::addCssClass($this->options, 'dropdown-menu-start');
        }
    }

    protected function renderItems($items, $options = [])
    {
        $lines = [];
        foreach ($items as $item) {
            if (is_string($item)) {
                $lines[] = $item;
                continue;
            }
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }

            // support divider
            if ($item === '-' || (isset($item['options']['class']) && strpos($item['options']['class'], 'dropdown-divider') !== false)) {
                $lines[] = Html::tag('div', '', ['class' => 'dropdown-divider']);
                continue;
            }

            // support header
            if (isset($item['type']) && $item['type'] === 'header') {
                $lines[] = Html::tag('div', ArrayHelper::getValue($item, 'label', ''), ['class' => 'dropdown-header']);
                continue;
            }

            $label = ArrayHelper::getValue($item, 'label', '');
            $url = ArrayHelper::getValue($item, 'url', '#');
            $itemOptions = ArrayHelper::getValue($item, 'options', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

            $icon = ArrayHelper::getValue($item, 'icon');
            if ($icon) {
                // Tabler dropdown icon
                $label = \bestyii\tabler\Icon::widget(['name' => $icon, 'options' => ['class' => 'dropdown-item-icon']]) . ' ' . $label;
            }

            Html::addCssClass($linkOptions, 'dropdown-item');

            if (isset($item['active']) && $item['active']) {
                Html::addCssClass($linkOptions, 'active');
            }

            // dropdown submenu support (Tabler style)
            if (isset($item['items'])) {
                Html::addCssClass($itemOptions, 'dropend');
                Html::addCssClass($linkOptions, 'dropdown-toggle');
                $linkOptions['data-bs-toggle'] = 'dropdown';
                $submenuOptions = $options;
                $submenuOptions['id'] = null; // Prevent ID conflicts

                $wrapLabel = Html::a($label, $url, $linkOptions);
                $lines[] = Html::tag('div', $wrapLabel . $this->renderItems($item['items'], $submenuOptions), $itemOptions);
            } else {
                $lines[] = Html::a($label, $url, $linkOptions);
            }
        }

        return Html::tag('div', implode("\n", $lines), $options);
    }
}
