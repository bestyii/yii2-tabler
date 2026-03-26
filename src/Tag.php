<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\Concerns\HasPresetStaticCalls;
use bestyii\tabler\Concerns\HasTablerColorPresetShortcuts;
use yii\helpers\Html;

/**
 * @method static string primary(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string secondary(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string success(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string info(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string warning(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string danger(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string blue(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string azure(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string indigo(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string purple(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string pink(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string red(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string orange(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string yellow(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string lime(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string green(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string teal(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string cyan(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 * @method static string dark(string $label, ?string $icon = null, bool $lite = true, bool $rounded = true, bool $removable = false, string|array|null $url = null, bool $encodeLabel = true, array $options = [])
 */
class Tag extends Widget
{
    use HasPresetStaticCalls;
    use HasTablerColorPresetShortcuts;

    public string $label = '';
    public ?string $icon = null;
    public ?string $color = null;
    public bool $lite = true;
    public bool $rounded = true;
    public bool $removable = false;
    public string|array|null $url = null;
    public bool $encodeLabel = true;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, 'tag');
        if ($this->rounded) {
            Html::addCssClass($this->options, 'rounded-pill');
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, $this->lite ? 'bg-' . $this->color . '-lt' : 'bg-' . $this->color);
        }

        $content = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        if ($this->icon !== null && $this->icon !== '') {
            $content = Icon::widget([
                'name' => $this->icon,
                'options' => [
                    'class' => 'me-1',
                ],
            ]) . $content;
        }

        if ($this->removable) {
            $content .= Html::button('', [
                'type' => 'button',
                'class' => 'btn-close ms-2',
                'aria-label' => 'Remove',
            ]);
        }

        if ($this->url !== null && $this->url !== '') {
            return Html::a($content, $this->url, $this->options);
        }

        return Html::tag('span', $content, $this->options);
    }

    /**
     * Typed alternative to widget([...]) for the common single-tag case.
     * Prefer named arguments when the color or link target is dynamic.
     */
    public static function make(
        string $color,
        string $label,
        ?string $icon = null,
        bool $lite = true,
        bool $rounded = true,
        bool $removable = false,
        string|array|null $url = null,
        bool $encodeLabel = true,
        array $options = [],
    ): string {
        return static::widget([
            'label' => $label,
            'icon' => $icon,
            'color' => $color,
            'lite' => $lite,
            'rounded' => $rounded,
            'removable' => $removable,
            'url' => $url,
            'encodeLabel' => $encodeLabel,
            'options' => $options,
        ]);
    }
}
