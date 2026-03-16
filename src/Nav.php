<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

class Nav extends Widget
{
    /**
     * @var array list of nav items. Each array represents a single nav item.
     */
    public $items = [];

    /**
     * @var array base class name
     */
    public $options = ['class' => 'navbar-nav'];

    /**
     * @var string the dropdown class to use
     */
    public $dropdownClass = '\bestyii\tabler\Dropdown';

    /**
     * @var bool whether the nav items support icons
     */
    public $encodeLabels = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        return $this->renderItems();
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'nav']);
    }

    protected function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            $items[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }

    protected function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new \yii\base\InvalidConfigException("The 'label' option is required.");
        }

        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

        // Handle Tabler specific Nav item structure
        $icon = ArrayHelper::getValue($item, 'icon');
        if ($icon) {
            $iconHtml = Html::tag('span', \bestyii\tabler\Icon::widget(['name' => $icon]), ['class' => 'nav-link-icon d-md-none d-lg-inline-block']);
            $titleHtml = Html::tag('span', $label, ['class' => 'nav-link-title']);
            $label = $iconHtml . "\n" . $titleHtml;
        }

        $active = ArrayHelper::getValue($item, 'active');
        if ($active === null && isset($item['url']) && $this->isItemActive($item)) {
            $active = true;
        }

        if (empty($items)) {
            $items = '';
        } else {
            Html::addCssClass($options, ['widget' => 'dropdown']);
            Html::addCssClass($linkOptions, ['widget' => 'dropdown-toggle']);
            $linkOptions['data-bs-toggle'] = 'dropdown';
            $linkOptions['role'] = 'button';
            $linkOptions['aria-expanded'] = 'false';

            if (is_array($items)) {
                $items = $this->renderDropdown($items, $item);
            }
        }

        Html::addCssClass($options, 'nav-item');
        Html::addCssClass($linkOptions, 'nav-link');

        if ($active) {
            Html::addCssClass($options, 'active');
            Html::addCssClass($linkOptions, 'active');
        }

        return Html::tag('li', Html::a($label, $url, $linkOptions) . "\n" . $items, $options);
    }

    protected function renderDropdown($items, $parentItem)
    {
        $dropdownClass = $this->dropdownClass;
        if (class_exists($dropdownClass)) {
            return $dropdownClass::widget([
                'items' => $items,
            ]);
        }
        return '';
    }

    /**
     * Checks whether a menu item is active.
     */
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && \Yii::$app->controller) {
                $route = \Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            if (ltrim($route, '/') !== \Yii::$app->requestedRoute) {
                return false;
            }
            unset($item['url'][0]);
            foreach ($item['url'] as $name => $value) {
                if ($value !== null && (!isset(\Yii::$app->request->queryParams[$name]) || \Yii::$app->request->queryParams[$name] != $value)) {
                    return false;
                }
            }
            return true;
        }

        return false;
    }
}
