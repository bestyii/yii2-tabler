<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Card extends Widget
{
    public ?string $title = null;
    public ?string $subtitle = null;
    public mixed $content = null;
    public mixed $contentHtml = null;
    public mixed $header = null;
    public ?string $headerHtml = null;
    public ?string $footer = null;
    public ?string $footerHtml = null;
    public array|string|null $tools = null;
    public ?string $statusColor = null;
    public string $statusPosition = 'top';
    public string|array|null $image = null;
    public bool $body = true;
    public array $options = [];
    public array $bodyOptions = [];
    public array $headerOptions = [];
    public array $footerOptions = [];

    public function init(): void
    {
        parent::init();
        ob_start();
        ob_implicit_flush(false);
    }

    public function run(): string
    {
        Html::addCssClass($this->options, 'card');
        Html::addCssClass($this->bodyOptions, 'card-body');
        Html::addCssClass($this->headerOptions, 'card-header');
        Html::addCssClass($this->footerOptions, 'card-footer');

        $content = [];

        if ($this->statusColor !== null && $this->statusColor !== '') {
            $content[] = Html::tag('div', '', [
                'class' => 'card-status-' . $this->statusPosition . ' bg-' . $this->statusColor,
            ]);
        }

        $imageTop = $this->renderImage('top');
        if ($imageTop !== '') {
            $content[] = $imageTop;
        }

        $header = $this->renderHeader();
        if ($header !== '') {
            $content[] = $header;
        }

        $body = $this->resolveBodyContent();
        if ($body !== '') {
            $content[] = $this->body ? Html::tag('div', $body, $this->bodyOptions) : $body;
        }

        $imageBottom = $this->renderImage('bottom');
        if ($imageBottom !== '') {
            $content[] = $imageBottom;
        }

        $footer = $this->resolveFooterContent();
        if ($footer !== '') {
            $content[] = Html::tag('div', $footer, $this->footerOptions);
        }

        return Html::tag('div', implode("\n", $content), $this->options);
    }

    private function resolveBodyContent(): string
    {
        $body = ob_get_clean();

        $content = $this->contentHtml ?? $this->content;
        if ($content !== null) {
            $body = (is_callable($content) ? (string) call_user_func($content) : (string) $content) . $body;
        }

        return $body;
    }

    private function renderHeader(): string
    {
        if ($this->headerHtml !== null) {
            return Html::tag('div', $this->headerHtml, $this->headerOptions);
        }

        if ($this->header !== null) {
            return Html::tag('div', (string) $this->header, $this->headerOptions);
        }

        if ($this->title === null && $this->subtitle === null && $this->tools === null) {
            return '';
        }

        $sections = [];
        $text = '';

        if ($this->title !== null && $this->title !== '') {
            $text .= Html::tag('h3', Html::encode($this->title), [
                'class' => 'card-title',
            ]);
        }

        if ($this->subtitle !== null && $this->subtitle !== '') {
            $text .= Html::tag('div', Html::encode($this->subtitle), [
                'class' => 'card-subtitle text-secondary',
            ]);
        }

        $sections[] = Html::tag('div', $text);

        if ($this->tools !== null) {
            $tools = is_array($this->tools)
                ? Html::tag('div', implode("\n", array_map(static fn($item): string => (string) $item, $this->tools)), [
                    'class' => 'btn-list',
                ])
                : (string) $this->tools;
            $sections[] = Html::tag('div', $tools, [
                'class' => 'card-actions',
            ]);
        }

        return Html::tag('div', implode("\n", $sections), $this->headerOptions);
    }

    private function resolveFooterContent(): string
    {
        return $this->footerHtml ?? (string) ($this->footer ?? '');
    }

    private function renderImage(string $position): string
    {
        if ($this->image === null || $this->image === '') {
            return '';
        }

        $src = is_array($this->image) ? (string) ($this->image['src'] ?? '') : (string) $this->image;
        $imagePosition = is_array($this->image) ? (string) ($this->image['position'] ?? 'top') : 'top';
        $options = is_array($this->image) ? (array) ($this->image['options'] ?? []) : [];

        if ($src === '' || $imagePosition !== $position) {
            return '';
        }

        Html::addCssClass($options, 'card-img-' . $position);

        return Html::img($src, $options);
    }
}
