<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class DropdownMenu extends Widget
{
    public array $items = [];
    public ?string $align = null;
    public bool $arrow = true;
    public bool $show = false;
    public bool $dark = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'dropdown-menu');

        if ($this->arrow) {
            Html::addCssClass($this->options, 'dropdown-menu-arrow');
        }

        if ($this->align === 'end') {
            Html::addCssClass($this->options, 'dropdown-menu-end');
        } elseif ($this->align === 'start') {
            Html::addCssClass($this->options, 'dropdown-menu-start');
        }

        if ($this->show) {
            Html::addCssClass($this->options, ['dropdown-menu-demo', 'show', 'd-block', 'position-static']);
        }

        if ($this->dark) {
            $this->options['data-bs-theme'] = 'dark';
        }

        return Html::tag('div', implode("\n", $this->renderItems()), $this->options);
    }

    /**
     * @return array<int, string>
     */
    private function renderItems(): array
    {
        $items = [];

        foreach ($this->items as $item) {
            if ($item === '-') {
                $items[] = Html::tag('div', '', [
                    'class' => 'dropdown-divider',
                ]);
                continue;
            }

            if (is_string($item)) {
                $items[] = Html::a(Html::encode($item), '#', [
                    'class' => 'dropdown-item',
                ]);
                continue;
            }

            if (($item['visible'] ?? true) === false) {
                continue;
            }

            $type = (string) ($item['type'] ?? 'link');
            if ($type === 'divider') {
                $items[] = Html::tag('div', '', [
                    'class' => 'dropdown-divider',
                ]);
                continue;
            }

            if ($type === 'header') {
                $items[] = Html::tag('div', (string) ($item['label'] ?? ''), [
                    'class' => 'dropdown-header',
                ]);
                continue;
            }

            if ($type === 'checkbox' || $type === 'radio') {
                $items[] = $this->renderChoiceItem($item, $type);
                continue;
            }

            $items[] = $this->renderLinkItem($item);
        }

        return $items;
    }

    private function renderChoiceItem(array $item, string $type): string
    {
        $label = (string) ($item['label'] ?? '');
        $input = Html::input($type, (string) ($item['name'] ?? 'dropdown-choice'), (string) ($item['value'] ?? $label), [
            'class' => 'form-check-input m-0 me-2',
            'checked' => !empty($item['checked']),
        ]);

        return Html::tag('label', $input . Html::encode($label), [
            'class' => 'dropdown-item',
        ]);
    }

    private function renderLinkItem(array $item): string
    {
        $label = (string) ($item['label'] ?? '');
        $url = (string) ($item['url'] ?? '#');
        $linkOptions = (array) ($item['options'] ?? []);
        Html::addCssClass($linkOptions, 'dropdown-item');

        if (!empty($item['active'])) {
            Html::addCssClass($linkOptions, 'active');
        }
        if (!empty($item['disabled'])) {
            Html::addCssClass($linkOptions, 'disabled');
            $linkOptions['tabindex'] = '-1';
            $linkOptions['aria-disabled'] = 'true';
        }
        if (!empty($item['danger'])) {
            Html::addCssClass($linkOptions, 'text-danger');
        }

        $content = '';
        if (!empty($item['icon'])) {
            $content .= Icon::widget([
                'name' => (string) $item['icon'],
                'options' => [
                    'class' => 'dropdown-item-icon',
                ],
            ]);
        }

        $content .= Html::encode($label);

        if (!empty($item['badge'])) {
            $content .= Html::tag('span', Html::encode((string) $item['badge']), [
                'class' => 'badge bg-primary text-primary-fg ms-auto',
            ]);
        }

        return Html::a($content, $url, $linkOptions);
    }
}
