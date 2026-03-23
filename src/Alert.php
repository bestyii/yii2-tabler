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
}
