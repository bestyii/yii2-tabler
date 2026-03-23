<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Toast extends Widget
{
    public ?string $title = null;
    public ?string $subtitle = null;
    public ?string $body = null;
    public ?string $icon = null;
    public ?string $avatar = null;
    public bool $showCloseButton = true;
    public bool $show = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'toast');
        if ($this->show) {
            Html::addCssClass($this->options, 'show');
        }
        $this->options['role'] ??= 'alert';
        $this->options['aria-live'] ??= 'assertive';
        $this->options['aria-atomic'] ??= 'true';

        $content = [];
        $header = $this->renderHeader();
        if ($header !== '') {
            $content[] = $header;
        }
        if ($this->body !== null && $this->body !== '') {
            $content[] = Html::tag('div', $this->body, [
                'class' => 'toast-body',
            ]);
        }

        return Html::tag('div', implode("\n", $content), $this->options);
    }

    private function renderHeader(): string
    {
        if ($this->title === null && !$this->showCloseButton) {
            return '';
        }

        $content = '';
        if ($this->avatar !== null && $this->avatar !== '') {
            $content .= Avatar::widget([
                'src' => $this->avatar,
                'size' => 'xs',
                'options' => [
                    'class' => 'me-2',
                ],
            ]);
        } elseif ($this->icon !== null && $this->icon !== '') {
            $content .= Icon::widget([
                'name' => $this->icon,
                'options' => [
                    'class' => 'me-2',
                ],
            ]);
        }

        if ($this->title !== null && $this->title !== '') {
            $content .= Html::tag('strong', Html::encode($this->title), [
                'class' => 'me-auto',
            ]);
        }
        if ($this->subtitle !== null && $this->subtitle !== '') {
            $content .= Html::tag('small', Html::encode($this->subtitle));
        }
        if ($this->showCloseButton) {
            $content .= Html::button('', [
                'type' => 'button',
                'class' => 'ms-2 btn-close',
                'data-bs-dismiss' => 'toast',
                'aria-label' => 'Close',
            ]);
        }

        return Html::tag('div', $content, [
            'class' => 'toast-header',
        ]);
    }
}
