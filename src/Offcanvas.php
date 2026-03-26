<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Offcanvas extends Widget
{
    public const PLACEMENT_START = 'start';
    public const PLACEMENT_END = 'end';
    public const PLACEMENT_TOP = 'top';
    public const PLACEMENT_BOTTOM = 'bottom';

    public ?string $title = null;
    public ?string $body = null;
    public string $placement = self::PLACEMENT_END;
    public bool $blur = true;
    public array $options = [];

    // Placement shortcuts stay thin and delegate to make().
    public static function left(
        ?string $title = null,
        ?string $body = null,
        bool $blur = true,
        array $options = [],
    ): string {
        return static::make(self::PLACEMENT_START, $title, $body, $blur, $options);
    }

    public static function right(
        ?string $title = null,
        ?string $body = null,
        bool $blur = true,
        array $options = [],
    ): string {
        return static::make(self::PLACEMENT_END, $title, $body, $blur, $options);
    }

    public static function top(
        ?string $title = null,
        ?string $body = null,
        bool $blur = true,
        array $options = [],
    ): string {
        return static::make(self::PLACEMENT_TOP, $title, $body, $blur, $options);
    }

    public static function bottom(
        ?string $title = null,
        ?string $body = null,
        bool $blur = true,
        array $options = [],
    ): string {
        return static::make(self::PLACEMENT_BOTTOM, $title, $body, $blur, $options);
    }

    /**
     * Typed alternative to widget([...]) for single-call offcanvas rendering.
     * Use widget() or begin()/end() when the body markup is assembled separately.
     */
    public static function make(
        string $placement = self::PLACEMENT_END,
        ?string $title = null,
        ?string $body = null,
        bool $blur = true,
        array $options = [],
    ): string {
        return static::widget([
            'title' => $title,
            'body' => $body,
            'placement' => $placement,
            'blur' => $blur,
            'options' => $options,
        ]);
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

        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, [
            'offcanvas' => 'offcanvas',
            'placement' => 'offcanvas-' . $this->placement,
        ]);
        if ($this->blur) {
            Html::addCssClass($this->options, 'offcanvas-blur');
            $this->options['data-bs-backdrop'] = 'true';
        }
        $this->options['tabindex'] ??= '-1';
        $this->options['aria-labelledby'] ??= $this->options['id'] . '-title';

        $content = [];
        if ($this->title !== null && $this->title !== '') {
            $content[] = Html::tag(
                'div',
                Html::tag('h2', Html::encode($this->title), [
                    'class' => 'offcanvas-title',
                    'id' => $this->options['id'] . '-title',
                ]) .
                Html::button('', [
                    'type' => 'button',
                    'class' => 'btn-close text-reset',
                    'data-bs-dismiss' => 'offcanvas',
                    'aria-label' => 'Close',
                ]),
                [
                    'class' => 'offcanvas-header',
                ],
            );
        }
        $content[] = Html::tag('div', $body, [
            'class' => 'offcanvas-body',
        ]);

        return Html::tag('div', implode("\n", $content), $this->options);
    }
}
