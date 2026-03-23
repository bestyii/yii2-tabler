<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class EmptyState extends Widget
{
    public ?string $icon = 'mood-sad';
    public ?string $iconText = null;
    public string $title = 'No results found';
    public string $subtitle = "Try adjusting your search or filter to find what you're looking for.";
    public bool $bordered = false;
    public ?string $buttonLabel = 'Search again';
    public string $buttonIcon = 'search';
    public string $buttonUrl = '.';
    public ?string $action = null;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'empty');
        if ($this->bordered) {
            Html::addCssClass($this->options, 'empty-bordered');
        }

        $content = $this->renderVisual();
        $content .= Html::tag('p', Html::encode($this->title), [
            'class' => 'empty-title',
        ]);
        $content .= Html::tag('p', Html::encode($this->subtitle), [
            'class' => 'empty-subtitle text-secondary',
        ]);

        $action = $this->action;
        if ($action === null && $this->buttonLabel !== null && $this->buttonLabel !== '') {
            $action = Button::widget([
                'label' => $this->buttonLabel,
                'icon' => $this->buttonIcon,
                'url' => $this->buttonUrl,
                'color' => 'primary',
            ]);
        }

        if ($action !== null && $action !== '') {
            $content .= Html::tag('div', $action, [
                'class' => 'empty-action',
            ]);
        }

        return Html::tag('div', $content, $this->options);
    }

    private function renderVisual(): string
    {
        if ($this->iconText !== null && $this->iconText !== '') {
            return Html::tag('div', Html::encode($this->iconText), [
                'class' => 'empty-header',
            ]);
        }

        if ($this->icon === null || $this->icon === '') {
            return '';
        }

        return Html::tag('div', Icon::widget([
            'name' => $this->icon,
        ]), [
            'class' => 'empty-icon',
        ]);
    }
}
