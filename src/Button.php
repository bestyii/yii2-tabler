<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\Concerns\HasPresetStaticCalls;
use bestyii\tabler\Concerns\HasTablerColorPresetShortcuts;
use yii\helpers\Html;

/**
 * @method static string primary(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string secondary(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string success(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string info(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string warning(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string danger(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string blue(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string azure(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string indigo(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string purple(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string pink(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string red(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string orange(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string yellow(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string lime(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string green(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string teal(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string cyan(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 * @method static string dark(string $label, ?string $icon = null, string|array|null $url = null, bool $outline = false, ?string $size = null, bool $encodeLabel = true, array $options = [])
 */
class Button extends Widget
{
    use HasPresetStaticCalls;
    use HasTablerColorPresetShortcuts;

    public string $label = 'Button';
    public ?string $icon = null;
    public string|array|null $url = null;
    public string $color = 'primary';
    public bool $outline = false;
    public ?string $size = null;
    public bool $encodeLabel = true;
    public array $options = [];

    public function run(): string
    {
        $classes = ['btn'];
        $classes[] = $this->outline ? 'btn-outline-' . $this->color : 'btn-' . $this->color;
        if ($this->size !== null) {
            $classes[] = 'btn-' . $this->size;
        }

        Html::addCssClass($this->options, $classes);

        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        if ($this->icon !== null && $this->icon !== '') {
            $label = Icon::widget([
                'name' => $this->icon,
                'options' => [
                    'class' => 'me-1',
                ],
            ]) . $label;
        }

        if ($this->url !== null) {
            return Html::a($label, $this->url, $this->options);
        }

        $this->options['type'] ??= 'button';
        return Html::tag('button', $label, $this->options);
    }

    /**
     * Typed alternative to widget([...]) for the common single-button case.
     * Prefer named arguments when the color or route target is assembled dynamically.
     */
    public static function make(
        string $color,
        string $label,
        ?string $icon = null,
        string|array|null $url = null,
        bool $outline = false,
        ?string $size = null,
        bool $encodeLabel = true,
        array $options = [],
    ): string {
        return static::widget([
            'label' => $label,
            'icon' => $icon,
            'url' => $url,
            'color' => $color,
            'outline' => $outline,
            'size' => $size,
            'encodeLabel' => $encodeLabel,
            'options' => $options,
        ]);
    }
}
