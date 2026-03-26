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
    public const FORMAT_TEXT = 'text';
    public const FORMAT_HTML = 'html';
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
    public ?string $titleHtml = null;
    public string $placement = self::PLACEMENT_AUTO;
    public string $trigger = self::TRIGGER_CLICK;
    public array $options = [];
    public array|false $toggleButton = false;
    public ?string $content = null;
    public ?string $contentHtml = null;
    public bool $sanitize = true;
    public array $clientOptions = [];

    // Placement shortcuts stay thin and delegate to make().
    public static function auto(
        ?string $content = null,
        ?string $title = null,
        string $trigger = self::TRIGGER_CLICK,
        array|false $toggleButton = false,
        array $clientOptions = [],
        array $options = [],
        ?string $contentHtml = null,
        ?string $titleHtml = null,
        bool $sanitize = true,
    ): string {
        return static::make(self::PLACEMENT_AUTO, $content, $title, $trigger, $toggleButton, $clientOptions, $options, $contentHtml, $titleHtml, $sanitize);
    }

    public static function top(
        ?string $content = null,
        ?string $title = null,
        string $trigger = self::TRIGGER_CLICK,
        array|false $toggleButton = false,
        array $clientOptions = [],
        array $options = [],
        ?string $contentHtml = null,
        ?string $titleHtml = null,
        bool $sanitize = true,
    ): string {
        return static::make(self::PLACEMENT_TOP, $content, $title, $trigger, $toggleButton, $clientOptions, $options, $contentHtml, $titleHtml, $sanitize);
    }

    public static function bottom(
        ?string $content = null,
        ?string $title = null,
        string $trigger = self::TRIGGER_CLICK,
        array|false $toggleButton = false,
        array $clientOptions = [],
        array $options = [],
        ?string $contentHtml = null,
        ?string $titleHtml = null,
        bool $sanitize = true,
    ): string {
        return static::make(self::PLACEMENT_BOTTOM, $content, $title, $trigger, $toggleButton, $clientOptions, $options, $contentHtml, $titleHtml, $sanitize);
    }

    public static function left(
        ?string $content = null,
        ?string $title = null,
        string $trigger = self::TRIGGER_CLICK,
        array|false $toggleButton = false,
        array $clientOptions = [],
        array $options = [],
        ?string $contentHtml = null,
        ?string $titleHtml = null,
        bool $sanitize = true,
    ): string {
        return static::make(self::PLACEMENT_LEFT, $content, $title, $trigger, $toggleButton, $clientOptions, $options, $contentHtml, $titleHtml, $sanitize);
    }

    public static function right(
        ?string $content = null,
        ?string $title = null,
        string $trigger = self::TRIGGER_CLICK,
        array|false $toggleButton = false,
        array $clientOptions = [],
        array $options = [],
        ?string $contentHtml = null,
        ?string $titleHtml = null,
        bool $sanitize = true,
    ): string {
        return static::make(self::PLACEMENT_RIGHT, $content, $title, $trigger, $toggleButton, $clientOptions, $options, $contentHtml, $titleHtml, $sanitize);
    }

    /**
     * Typed alternative to widget([...]) for the common single-trigger popover case.
     * Use widget() or begin()/end() when the content markup is captured separately.
     */
    public static function make(
        string $placement = self::PLACEMENT_AUTO,
        ?string $content = null,
        ?string $title = null,
        string $trigger = self::TRIGGER_CLICK,
        array|false $toggleButton = false,
        array $clientOptions = [],
        array $options = [],
        ?string $contentHtml = null,
        ?string $titleHtml = null,
        bool $sanitize = true,
    ): string {
        return static::widget([
            'title' => $title,
            'titleHtml' => $titleHtml,
            'placement' => $placement,
            'trigger' => $trigger,
            'options' => $options,
            'toggleButton' => $toggleButton,
            'content' => $content,
            'contentHtml' => $contentHtml,
            'sanitize' => $sanitize,
            'clientOptions' => $clientOptions,
        ]);
    }

    public function init(): void
    {
        parent::init();
        TablerAsset::register($this->getView());
        $this->options['id'] ??= $this->getId();
        ob_start();
        ob_implicit_flush(false);
    }

    public function run(): string
    {
        $bufferedContent = trim((string) ob_get_clean());
        $content = $this->resolveContentPayload($bufferedContent);
        $title = $this->resolveTitlePayload();
        $usesHtml = $title['html'] || $content['html'];

        if ($usesHtml && !$title['html'] && $title['value'] !== null) {
            $title['value'] = Html::encode($title['value']);
        }
        if ($usesHtml && !$content['html'] && $content['value'] !== null) {
            $content['value'] = Html::encode($content['value']);
        }

        $this->registerPopover($title['value'], $content['value'], $usesHtml);

        return $this->renderToggleButton();
    }

    protected function renderToggleButton(): string
    {
        if ($this->toggleButton === false) {
            return '';
        }

        $toggleButton = $this->toggleButton;
        $tag = ArrayHelper::remove($toggleButton, 'tag', 'button');
        $label = (string) ArrayHelper::remove($toggleButton, 'label', 'Show');
        $encodeLabel = (bool) ArrayHelper::remove($toggleButton, 'encodeLabel', true);
        if ($encodeLabel) {
            $label = Html::encode($label);
        }
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

    private function registerPopover(?string $title, ?string $content, bool $usesHtml): void
    {
        $options = array_merge([
            'html' => false,
            'placement' => $this->placement,
            'trigger' => $this->trigger,
            'sanitize' => $this->sanitize,
        ], $this->clientOptions);

        if ($usesHtml) {
            $options['html'] = true;
        }

        if ($title !== null && !array_key_exists('title', $options)) {
            $options['title'] = $title;
        }
        if ($content !== null && $content !== '' && !array_key_exists('content', $options)) {
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

    /**
     * @return array{value: ?string, html: bool}
     */
    private function resolveContentPayload(string $bufferedContent): array
    {
        if ($bufferedContent !== '') {
            return [
                'value' => $bufferedContent,
                'html' => true,
            ];
        }

        if ($this->contentHtml !== null) {
            return [
                'value' => $this->contentHtml,
                'html' => true,
            ];
        }

        return [
            'value' => $this->content,
            'html' => false,
        ];
    }

    /**
     * @return array{value: ?string, html: bool}
     */
    private function resolveTitlePayload(): array
    {
        if ($this->titleHtml !== null) {
            return [
                'value' => $this->titleHtml,
                'html' => true,
            ];
        }

        return [
            'value' => $this->title,
            'html' => false,
        ];
    }
}
