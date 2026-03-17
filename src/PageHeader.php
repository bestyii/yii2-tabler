<?php

namespace bestyii\tabler;

use yii\helpers\Html;

class PageHeader extends Widget
{
    public ?string $preTitle = null;
    public string $title = '';
    public ?string $content = null;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, ['page-header' => 'page-header']);

        $parts = [];
        if ($this->preTitle) {
            $parts[] = Html::tag('div', Html::encode($this->preTitle), ['class' => 'page-pretitle']);
        }

        $parts[] = Html::tag('h2', Html::encode($this->title), ['class' => 'page-title']);

        if ($this->content !== null && $this->content !== '') {
            $parts[] = $this->content;
        }

        return Html::tag('div', implode("\n", $parts), $this->options);
    }
}
