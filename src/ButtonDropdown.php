<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\Concerns\HasPresetStaticCalls;
use bestyii\tabler\Concerns\HasTablerColorPresetShortcuts;
use bestyii\tabler\assets\TablerAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @method static string primary(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string secondary(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string success(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string info(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string warning(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string danger(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string blue(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string azure(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string indigo(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string purple(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string pink(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string red(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string orange(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string yellow(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string lime(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string green(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string teal(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string cyan(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 * @method static string dark(?string $label = 'Button', array $dropdown = [], ?string $icon = null, string $direction = self::DIRECTION_DOWN, bool $split = false, array $buttonOptions = [], bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [], string $dropdownClass = 'bestyii\tabler\DropdownMenu', bool $renderContainer = true, string $tagName = 'button')
 */
class ButtonDropdown extends Widget
{
    use HasPresetStaticCalls;
    use HasTablerColorPresetShortcuts;

    public const DIRECTION_DOWN = 'down';
    public const DIRECTION_LEFT = 'left';
    public const DIRECTION_RIGHT = 'right';
    public const DIRECTION_UP = 'up';

    public ?string $label = 'Button';
    public ?string $icon = null;
    public array $options = [];
    public array $buttonOptions = [];
    public array $dropdown = [];
    public string $direction = self::DIRECTION_DOWN;
    public bool $split = false;
    public string $tagName = 'button';
    public bool $encodeLabel = true;
    public string $dropdownClass = DropdownMenu::class;
    public bool $renderContainer = true;
    public string $color = 'primary';
    public bool $outline = false;
    public ?string $size = null;

    /**
     * Typed alternative to widget([...]) for the common dropdown-button case.
     * Prefer named arguments when direction, split mode or menu config is dynamic.
     */
    public static function make(
        string $color,
        ?string $label = 'Button',
        array $dropdown = [],
        ?string $icon = null,
        string $direction = self::DIRECTION_DOWN,
        bool $split = false,
        array $buttonOptions = [],
        bool $outline = false,
        ?string $size = null,
        bool $encodeLabel = true,
        array $options = [],
        string $dropdownClass = DropdownMenu::class,
        bool $renderContainer = true,
        string $tagName = 'button',
    ): string {
        return static::widget([
            'label' => $label,
            'icon' => $icon,
            'options' => $options,
            'buttonOptions' => $buttonOptions,
            'dropdown' => $dropdown,
            'direction' => $direction,
            'split' => $split,
            'tagName' => $tagName,
            'encodeLabel' => $encodeLabel,
            'dropdownClass' => $dropdownClass,
            'renderContainer' => $renderContainer,
            'color' => $color,
            'outline' => $outline,
            'size' => $size,
        ]);
    }

    public function init(): void
    {
        parent::init();
        TablerAsset::register($this->getView());

        $this->options['id'] ??= $this->getId();
        $this->buttonOptions['id'] ??= $this->options['id'] . '-button';
    }

    public function run(): string
    {
        $html = $this->renderButton() . "\n" . $this->renderDropdown();
        if (!$this->renderContainer) {
            return $html;
        }

        $options = $this->options;
        Html::addCssClass($options, 'btn-group');
        $directionClass = $this->resolveDirectionClass();
        if ($directionClass !== null) {
            Html::addCssClass($options, $directionClass);
        }
        $options['role'] ??= 'group';

        return Html::tag(ArrayHelper::remove($options, 'tag', 'div'), $html, $options);
    }

    protected function renderButton(): string
    {
        if ($this->split) {
            return $this->renderActionButton() . "\n" . $this->renderToggleElement('<span class="visually-hidden">Toggle Dropdown</span>', true);
        }

        return $this->renderToggleElement($this->renderLabel(), false);
    }

    protected function renderDropdown(): string
    {
        $config = $this->dropdown;
        $class = ArrayHelper::remove($config, 'class', $this->dropdownClass);
        $config['items'] ??= [];
        $config['arrow'] ??= false;

        return $class::widget($config);
    }

    private function renderActionButton(): string
    {
        $options = $this->prepareButtonOptions($this->buttonOptions);

        return $this->renderElement($this->renderLabel(), $options);
    }

    private function renderToggleElement(string $label, bool $split): string
    {
        $options = $this->prepareButtonOptions($this->buttonOptions);
        if ($split) {
            $options['id'] = ($this->buttonOptions['id'] ?? $this->options['id'] . '-button') . '-toggle';
        }
        $options['data-bs-toggle'] = 'dropdown';
        $options['aria-expanded'] = 'false';
        if ($split) {
            Html::addCssClass($options, 'dropdown-toggle');
            Html::addCssClass($options, 'dropdown-toggle-split');
            unset($options['href']);

            return Html::button($label, $options);
        }

        Html::addCssClass($options, 'dropdown-toggle');

        return $this->renderElement($label, $options);
    }

    private function renderElement(string $label, array $options): string
    {
        $tagName = $this->tagName;
        $href = ArrayHelper::remove($options, 'href');
        if ($href !== null || $tagName === 'a') {
            $url = $href === null ? '#' : Url::to($href);
            $options['role'] ??= 'button';

            return Html::a($label, $url, $options);
        }

        $options['type'] ??= 'button';

        return Html::tag($tagName, $label, $options);
    }

    private function renderLabel(): string
    {
        $label = $this->label ?? 'Button';
        $label = $this->encodeLabel ? Html::encode($label) : $label;
        if ($this->icon === null || $this->icon === '') {
            return $label;
        }

        return Icon::widget([
            'name' => $this->icon,
            'options' => [
                'class' => 'me-1',
            ],
        ]) . $label;
    }

    private function prepareButtonOptions(array $options): array
    {
        $classes = ['btn'];
        $classes[] = $this->outline ? 'btn-outline-' . $this->color : 'btn-' . $this->color;
        if ($this->size !== null && $this->size !== '') {
            $classes[] = 'btn-' . $this->size;
        }

        Html::addCssClass($options, $classes);

        return $options;
    }

    private function resolveDirectionClass(): ?string
    {
        return match ($this->direction) {
            self::DIRECTION_LEFT => 'dropstart',
            self::DIRECTION_RIGHT => 'dropend',
            self::DIRECTION_UP => 'dropup',
            default => null,
        };
    }
}
