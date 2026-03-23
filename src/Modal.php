<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Modal extends Widget
{
    public mixed $header = null;
    public array $headerOptions = [];
    public ?string $title = null;
    public array $titleOptions = [
        'class' => 'modal-title',
    ];
    public array|bool $closeButton = [];
    public ?string $footer = null;
    public array $footerOptions = [];
    public ?string $size = null;
    public bool $centered = true;
    public bool $blur = true;
    public ?string $statusColor = null;
    public ?string $status = null;
    public array $options = [];
    public array $dialogOptions = [];
    public mixed $body = null;

    public function init(): void
    {
        parent::init();
        ob_start();
        ob_implicit_flush(false);
    }

    public function run(): string
    {
        if ($this->status !== null && $this->statusColor === null) {
            $this->statusColor = $this->status;
        }

        $body = ob_get_clean();
        if ($this->body !== null) {
            $body .= is_callable($this->body) ? (string) call_user_func($this->body) : (string) $this->body;
        }

        $this->options['id'] ??= $this->getId();
        $this->options['tabindex'] ??= '-1';
        $this->options['role'] ??= 'dialog';
        $this->options['aria-hidden'] ??= 'true';
        Html::addCssClass($this->options, [
            'modal' => 'modal',
            'fade' => 'fade',
        ]);
        if ($this->blur) {
            Html::addCssClass($this->options, 'modal-blur');
        }

        $this->dialogOptions['role'] ??= 'document';
        Html::addCssClass($this->dialogOptions, 'modal-dialog');
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->dialogOptions, 'modal-' . $this->size);
        }
        if ($this->centered) {
            Html::addCssClass($this->dialogOptions, 'modal-dialog-centered');
        }

        $sections = [];
        if ($this->statusColor !== null && $this->statusColor !== '') {
            $sections[] = Html::tag('div', '', [
                'class' => 'modal-status bg-' . $this->statusColor,
            ]);
        }

        $header = $this->renderHeader();
        if ($header !== '') {
            $sections[] = $header;
        }

        $sections[] = Html::tag('div', $body, [
            'class' => 'modal-body',
        ]);

        $footer = $this->renderFooter();
        if ($footer !== '') {
            $sections[] = $footer;
        }

        $content = Html::tag('div', implode("\n", $sections), [
            'class' => 'modal-content',
        ]);
        $dialog = Html::tag('div', $content, $this->dialogOptions);

        return Html::tag('div', $dialog, $this->options);
    }

    private function renderHeader(): string
    {
        $content = '';

        if ($this->header !== null) {
            $content = (string) $this->header;
        } elseif ($this->title !== null && $this->title !== '') {
            $content = Html::tag('h5', Html::encode($this->title), $this->titleOptions);
        }

        $closeButton = $this->renderCloseButton();
        if ($closeButton !== null) {
            $content .= ($content === '' ? '' : "\n") . $closeButton;
        }

        if ($content === '') {
            return '';
        }

        Html::addCssClass($this->headerOptions, 'modal-header');
        return Html::tag('div', $content, $this->headerOptions);
    }

    private function renderFooter(): string
    {
        if ($this->footer === null || $this->footer === '') {
            return '';
        }

        Html::addCssClass($this->footerOptions, 'modal-footer');
        return Html::tag('div', $this->footer, $this->footerOptions);
    }

    private function renderCloseButton(): ?string
    {
        if ($this->closeButton === false) {
            return null;
        }

        $options = (array) $this->closeButton;
        Html::addCssClass($options, 'btn-close');
        $options['type'] ??= 'button';
        $options['data-bs-dismiss'] = 'modal';
        $options['aria-label'] ??= 'Close';

        return Html::button('', $options);
    }
}
