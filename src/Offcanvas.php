<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Offcanvas extends Widget
{
    public ?string $title = null;
    public ?string $body = null;
    public string $placement = 'end';
    public bool $blur = true;
    public array $options = [];

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
