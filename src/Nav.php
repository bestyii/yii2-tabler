<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\base\InvalidConfigException;
use yii\helpers\Html;

class Nav extends Widget
{
    public array $items = [];
    public array $options = [
        'class' => 'navbar-nav',
    ];
    public bool $encodeLabels = false;

    public function run(): string
    {
        Html::addCssClass($this->options, 'nav');

        $items = [];
        foreach ($this->items as $item) {
            if (is_array($item) && isset($item['visible']) && !$item['visible']) {
                continue;
            }

            $items[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }

    private function renderItem(array|string $item): string
    {
        if (is_string($item)) {
            return $item;
        }

        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }

        $hasChildren = !empty($item['items']);
        $options = (array) ($item['options'] ?? []);
        $linkOptions = (array) ($item['linkOptions'] ?? []);
        $label = $this->renderLabel($item);
        $url = $item['url'] ?? '#';
        $active = (bool) ($item['active'] ?? $this->isItemActive($item));

        Html::addCssClass($options, 'nav-item');
        Html::addCssClass($linkOptions, 'nav-link');

        if ($hasChildren) {
            Html::addCssClass($options, 'dropdown');
            Html::addCssClass($linkOptions, 'dropdown-toggle');
            $linkOptions['data-bs-toggle'] = 'dropdown';
            $linkOptions['aria-expanded'] = 'false';
            $linkOptions['role'] = 'button';
        }

        if ($active) {
            Html::addCssClass($options, 'active');
            Html::addCssClass($linkOptions, 'active');
        }

        $content = Html::a($label, $url, $linkOptions);
        if ($hasChildren) {
            $content .= "\n" . $this->renderDropdown((array) $item['items']);
        }

        return Html::tag('li', $content, $options);
    }

    private function renderLabel(array $item): string
    {
        $label = (string) $item['label'];
        $label = ($item['encode'] ?? $this->encodeLabels) ? Html::encode($label) : $label;

        if (empty($item['icon'])) {
            return $label;
        }

        return Html::tag('span', Icon::widget([
            'name' => (string) $item['icon'],
        ]), [
            'class' => 'nav-link-icon d-md-none d-lg-inline-block',
        ]) .
            Html::tag('span', $label, [
                'class' => 'nav-link-title',
            ]);
    }

    private function renderDropdown(array $items): string
    {
        $content = [];
        foreach ($items as $item) {
            if (is_string($item)) {
                $content[] = Html::tag('li', $item);
                continue;
            }

            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }

            if (!isset($item['label'])) {
                throw new InvalidConfigException("The 'label' option is required.");
            }

            $options = (array) ($item['options'] ?? []);
            $linkOptions = (array) ($item['linkOptions'] ?? []);
            $label = ($item['encode'] ?? $this->encodeLabels)
                ? Html::encode((string) $item['label'])
                : (string) $item['label'];

            Html::addCssClass($linkOptions, 'dropdown-item');
            if (!empty($item['active'])) {
                Html::addCssClass($linkOptions, 'active');
            }

            $content[] = Html::tag('li', Html::a($label, $item['url'] ?? '#', $linkOptions), $options);
        }

        return Html::tag('ul', implode("\n", $content), [
            'class' => 'dropdown-menu',
        ]);
    }

    private function isItemActive(array $item): bool
    {
        if (!isset($item['url']) || !is_array($item['url']) || !isset($item['url'][0]) || !\Yii::$app->controller) {
            return false;
        }

        $route = (string) $item['url'][0];
        if ($route !== '' && $route[0] !== '/') {
            $route = \Yii::$app->controller->module->getUniqueId() . '/' . $route;
        }

        if (ltrim($route, '/') !== \Yii::$app->requestedRoute) {
            return false;
        }

        $queryParams = \Yii::$app->request->queryParams;
        foreach (array_slice($item['url'], 1, null, true) as $name => $value) {
            if ($value !== null && (!array_key_exists($name, $queryParams) || $queryParams[$name] !== $value)) {
                return false;
            }
        }

        return true;
    }
}
