<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\TablerAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

class Popover extends Widget
{
    public const PLACEMENT_AUTO = 'auto';
    public const PLACEMENT_TOP = 'top';
    public const PLACEMENT_BOTTOM = 'bottom';
    public const PLACEMENT_LEFT = 'left';
    public const PLACEMENT_RIGHT = 'right';
    public const TRIGGER_CLICK = 'click';
    public const TRIGGER_HOVER = 'hover';
    public const TRIGGER_FOCUS = 'focus';
    public const TRIGGER_MANUAL = 'manual';

    public ?string $title = null;
    public string $placement = self::PLACEMENT_AUTO;
    public string $trigger = self::TRIGGER_CLICK;
    public array $options = [];
    public array|false $toggleButton = false;
    public ?string $content = null;
    public array $clientOptions = [];

    public function init(): void
    {
        parent::init();
        TablerAsset::register($this->getView());
        $this->options['id'] ??= $this->getId();
        ob_start();
        ob_implicit_flush(false);
    }

    public function run(): ?string
    {
        $content = trim((string) ob_get_clean());
        if ($content === '' && $this->content !== null) {
            $content = $this->content;
        }

        $this->registerPopover($content);

        return $this->renderToggleButton();
    }

    protected function renderToggleButton(): ?string
    {
        if ($this->toggleButton === false) {
            return null;
        }

        $toggleButton = $this->toggleButton;
        $tag = ArrayHelper::remove($toggleButton, 'tag', 'button');
        $label = (string) ArrayHelper::remove($toggleButton, 'label', 'Show');
        Html::addCssClass($toggleButton, ['btn', 'btn-secondary']);
        $toggleButton['id'] = $this->options['id'];
        $toggleButton['data-bs-toggle'] = 'popover';
        if ($tag === 'a') {
            $href = ArrayHelper::remove($toggleButton, 'href', '#');
            $toggleButton['role'] ??= 'button';

            return Html::a($label, $href, $toggleButton);
        }

        $toggleButton['type'] ??= 'button';

        return Html::tag($tag, $label, $toggleButton);
    }

    private function registerPopover(string $content): void
    {
        $options = array_merge([
            'html' => true,
            'placement' => $this->placement,
            'trigger' => $this->trigger,
            'sanitize' => false,
        ], $this->clientOptions);

        if ($this->title !== null && !array_key_exists('title', $options)) {
            $options['title'] = $this->title;
        }
        if ($content !== '' && !array_key_exists('content', $options)) {
            $options['content'] = $content;
        }

        $id = Json::htmlEncode($this->options['id']);
        $json = Json::htmlEncode($options);
        $script = <<<JS
(function () {
    const element = document.getElementById($id);
    if (!element || typeof bootstrap === 'undefined' || !bootstrap.Popover) {
        return;
    }

    bootstrap.Popover.getOrCreateInstance(element, $json);
})();
JS;

        $this->getView()->registerJs($script, View::POS_READY);
    }
}
