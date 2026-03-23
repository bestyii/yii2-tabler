<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class Status extends Widget
{
    public ?string $text = null;
    public string $color = 'green';
    public bool $showDot = true;
    public bool $encodeText = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, [
            'status' => 'status',
            'color' => 'status-' . $this->color,
        ]);

        $content = '';
        if ($this->showDot) {
            $content .= Html::tag('span', '', [
                'class' => 'status-dot bg-' . $this->color,
            ]);
        }

        if ($this->text !== null && $this->text !== '') {
            $content .= Html::tag(
                'span',
                $this->encodeText ? Html::encode($this->text) : $this->text,
                [
                    'class' => 'status-text',
                ],
            );
        }

        return Html::tag('span', $content, $this->options);
    }
}
