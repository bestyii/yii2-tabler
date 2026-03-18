<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Avatar extends Widget
{
    public ?string $url = null;
    public ?string $src = null;
    public ?string $initials = null;
    public ?string $text = null;
    public ?string $size = null;
    public ?string $shape = null;
    public ?string $color = null;
    public ?string $icon = null;
    public bool $lite = true;
    public ?string $status = null;
    public bool $stacked = false;
    public array $options = [];
    public array $statusOptions = [];

    public function run(): string
    {
        if ($this->text !== null && $this->initials === null) {
            $this->initials = $this->text;
        }
        if ($this->src !== null && $this->url === null) {
            $this->url = $this->src;
        }

        Html::addCssClass($this->options, 'avatar');
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, 'avatar-' . $this->size);
        }
        if ($this->shape === 'circle') {
            Html::addCssClass($this->options, 'rounded-circle');
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, $this->lite ? 'bg-' . $this->color . '-lt' : 'bg-' . $this->color);
        }
        if ($this->stacked) {
            Html::addCssClass($this->options, 'avatar-stacked');
        }
        if ($this->url !== null && $this->url !== '') {
            $style = rtrim((string) ($this->options['style'] ?? ''), '; ');
            $this->options['style'] = trim($style . '; background-image: url(' . $this->url . ')', '; ');
        }

        $content = '';
        if ($this->url === null || $this->url === '') {
            if ($this->icon !== null && $this->icon !== '') {
                $content = Icon::widget(['name' => $this->icon]);
            } elseif ($this->initials !== null && $this->initials !== '') {
                $content = Html::encode($this->initials);
            }
        }

        if ($this->status !== null && $this->status !== '') {
            Html::addCssClass($this->statusOptions, 'badge');
            Html::addCssClass($this->statusOptions, 'bg-' . $this->status);
            $content .= Html::tag('span', '', $this->statusOptions);
        }

        return Html::tag('span', $content, $this->options);
    }
}
