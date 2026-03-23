<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\Html;

class ButtonToolbar extends Widget
{
    public array $buttonGroups = [];
    public array $options = [];

    public function init(): void
    {
        parent::init();
        Html::addCssClass($this->options, 'btn-toolbar');
        $this->options['role'] ??= 'toolbar';
    }

    public function run(): string
    {
        $groups = [];
        foreach ($this->buttonGroups as $group) {
            if (is_string($group)) {
                $groups[] = $group;
                continue;
            }

            $config = $group;
            if (!isset($config['items']) && isset($config['buttons'])) {
                $config['items'] = (array) $config['buttons'];
                unset($config['buttons']);
            }

            $config['options'] ??= [];
            Html::addCssClass($config['options'], 'me-2');
            $groups[] = ButtonGroup::widget($config);
        }

        return Html::tag('div', implode("\n", $groups), $this->options);
    }
}
