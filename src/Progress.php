<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class Progress extends Widget
{
    public float|int $percent = 0;
    public float|int|null $value = null;
    public ?string $label = null;
    public string $color = 'primary';
    public ?string $size = null;
    public bool $separated = false;
    public bool $striped = false;
    public bool $animated = false;
    public bool $indeterminate = false;
    public array $options = [];
    public array $barOptions = [];
    public array $bars = [];

    public function run(): string
    {
        if ($this->value !== null) {
            $this->percent = $this->value;
        }

        Html::addCssClass($this->options, 'progress');
        if ($this->size !== null && $this->size !== '') {
            Html::addCssClass($this->options, 'progress-' . $this->size);
        }
        if ($this->separated) {
            Html::addCssClass($this->options, 'progress-separated');
        }

        $bars = $this->bars;
        if ($bars === []) {
            $bars = [[
                'percent' => $this->percent,
                'label' => $this->label,
                'color' => $this->color,
                'striped' => $this->striped,
                'animated' => $this->animated,
                'indeterminate' => $this->indeterminate,
                'options' => $this->barOptions,
            ]];
        } else {
            Html::addCssClass($this->options, 'progress-stacked');
        }

        $content = [];
        foreach ($bars as $bar) {
            $content[] = $this->renderBar((array) $bar);
        }

        return Html::tag('div', implode("\n", $content), $this->options);
    }

    private function renderBar(array $config): string
    {
        $percent = (float) ($config['percent'] ?? 0);
        $options = (array) ($config['options'] ?? []);

        Html::addCssClass($options, 'progress-bar');
        if (!empty($config['striped'])) {
            Html::addCssClass($options, 'progress-bar-striped');
        }
        if (!empty($config['animated'])) {
            Html::addCssClass($options, 'progress-bar-animated');
        }
        if (!empty($config['color'])) {
            Html::addCssClass($options, 'bg-' . $config['color']);
        }
        if (!empty($config['indeterminate'])) {
            Html::addCssClass($options, 'progress-bar-indeterminate');
        } else {
            $style = rtrim((string) ($options['style'] ?? ''), '; ');
            $options['style'] = trim($style . '; width: ' . $percent . '%', '; ');
        }

        $options['role'] = 'progressbar';
        $options['aria-valuenow'] = (string) $percent;
        $options['aria-valuemin'] = '0';
        $options['aria-valuemax'] = '100';

        $label = $config['label'] ?? null;
        $content = $label !== null && $label !== ''
            ? Html::tag('span', Html::encode((string) $label), ['class' => 'progress-bar-label'])
            : '';

        return Html::tag('div', $content, $options);
    }
}
