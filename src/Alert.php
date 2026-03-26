<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Alert extends Widget
{
    public ?string $title = null;
    public ?string $body = null;
    public string $type = 'info';
    public ?string $icon = null;
    public bool $dismissible = true;
    public bool $important = false;
    public array $options = [];

    // Shortcut type methods stay thin and delegate to make().
    public static function primary(
        ?string $body = null,
        ?string $title = null,
        ?string $icon = null,
        bool $dismissible = true,
        bool $important = false,
        array $options = [],
    ): string {
        return static::make('primary', $body, $title, $icon, $dismissible, $important, $options);
    }

    public static function secondary(
        ?string $body = null,
        ?string $title = null,
        ?string $icon = null,
        bool $dismissible = true,
        bool $important = false,
        array $options = [],
    ): string {
        return static::make('secondary', $body, $title, $icon, $dismissible, $important, $options);
    }

    public static function success(
        ?string $body = null,
        ?string $title = null,
        ?string $icon = null,
        bool $dismissible = true,
        bool $important = false,
        array $options = [],
    ): string {
        return static::make('success', $body, $title, $icon, $dismissible, $important, $options);
    }

    public static function info(
        ?string $body = null,
        ?string $title = null,
        ?string $icon = null,
        bool $dismissible = true,
        bool $important = false,
        array $options = [],
    ): string {
        return static::make('info', $body, $title, $icon, $dismissible, $important, $options);
    }

    public static function warning(
        ?string $body = null,
        ?string $title = null,
        ?string $icon = null,
        bool $dismissible = true,
        bool $important = false,
        array $options = [],
    ): string {
        return static::make('warning', $body, $title, $icon, $dismissible, $important, $options);
    }

    public static function danger(
        ?string $body = null,
        ?string $title = null,
        ?string $icon = null,
        bool $dismissible = true,
        bool $important = false,
        array $options = [],
    ): string {
        return static::make('danger', $body, $title, $icon, $dismissible, $important, $options);
    }

    public function init(): void
    {
        parent::init();
        ob_start();
        ob_implicit_flush(false);
    }

    public function run(): string
    {
        $body = ob_get_clean();
        if ($this->body !== null) {
            $body .= $this->body;
        }

        Html::addCssClass($this->options, [
            'alert' => 'alert',
            'type' => 'alert-' . $this->type,
        ]);
        if ($this->important) {
            Html::addCssClass($this->options, 'alert-important');
        }
        if ($this->dismissible) {
            Html::addCssClass($this->options, 'alert-dismissible');
        }
        $this->options['role'] ??= 'alert';

        $bodyHtml = [];
        if ($this->title !== null && $this->title !== '') {
            $bodyHtml[] = Html::tag('h4', Html::encode($this->title), [
                'class' => 'alert-title',
            ]);
        }
        if ($body !== '') {
            $bodyHtml[] = Html::tag('div', $body, [
                'class' => 'text-secondary',
            ]);
        }

        $content = implode("\n", $bodyHtml);
        if ($this->icon !== null && $this->icon !== '') {
            $content = Html::tag(
                'div',
                Html::tag('div', Icon::widget([
                    'name' => $this->icon,
                ]), [
                    'class' => 'alert-icon',
                ]) .
                Html::tag('div', $content),
                [
                    'class' => 'd-flex',
                ],
            );
        }

        if ($this->dismissible) {
            $content .= "\n" . Html::button('', [
                'class' => 'btn-close',
                'type' => 'button',
                'data-bs-dismiss' => 'alert',
                'aria-label' => 'Close',
            ]);
        }

        return Html::tag('div', $content, $this->options);
    }

    /**
     * Typed alternative to widget([...]) for single-call alert rendering.
     * Use widget() or begin()/end() when the body content is assembled separately.
     */
    public static function make(
        string $type,
        ?string $body = null,
        ?string $title = null,
        ?string $icon = null,
        bool $dismissible = true,
        bool $important = false,
        array $options = [],
    ): string {
        return static::widget([
            'title' => $title,
            'body' => $body,
            'type' => $type,
            'icon' => $icon,
            'dismissible' => $dismissible,
            'important' => $important,
            'options' => $options,
        ]);
    }
}
