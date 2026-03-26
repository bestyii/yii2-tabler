<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\Concerns\HasPresetStaticCalls;
use bestyii\tabler\Concerns\HasTablerColorPresetShortcuts;
use yii\helpers\Html;

/**
 * @method static string primary(string $text, bool $lite = false, array $options = [])
 * @method static string secondary(string $text, bool $lite = false, array $options = [])
 * @method static string success(string $text, bool $lite = false, array $options = [])
 * @method static string info(string $text, bool $lite = false, array $options = [])
 * @method static string warning(string $text, bool $lite = false, array $options = [])
 * @method static string danger(string $text, bool $lite = false, array $options = [])
 * @method static string blue(string $text, bool $lite = false, array $options = [])
 * @method static string azure(string $text, bool $lite = false, array $options = [])
 * @method static string indigo(string $text, bool $lite = false, array $options = [])
 * @method static string purple(string $text, bool $lite = false, array $options = [])
 * @method static string pink(string $text, bool $lite = false, array $options = [])
 * @method static string red(string $text, bool $lite = false, array $options = [])
 * @method static string orange(string $text, bool $lite = false, array $options = [])
 * @method static string yellow(string $text, bool $lite = false, array $options = [])
 * @method static string lime(string $text, bool $lite = false, array $options = [])
 * @method static string green(string $text, bool $lite = false, array $options = [])
 * @method static string teal(string $text, bool $lite = false, array $options = [])
 * @method static string cyan(string $text, bool $lite = false, array $options = [])
 * @method static string dark(string $text, bool $lite = false, array $options = [])
 */
class Badge extends Widget
{
    use HasPresetStaticCalls;
    use HasTablerColorPresetShortcuts;

    public string $text = '';
    public string $color = 'secondary';
    public bool $lite = false;
    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, [
            'badge' => 'badge',
        ]);
        Html::addCssClass($this->options, $this->lite ? 'bg-' . $this->color . '-lt' : 'bg-' . $this->color);

        return Html::tag('span', Html::encode($this->text), $this->options);
    }

    /**
     * Typed alternative to widget([...]) for the common single-badge case.
     * Prefer named arguments when the color is dynamic.
     */
    public static function make(string $color, string $text, bool $lite = false, array $options = []): string
    {
        return static::widget([
            'text' => $text,
            'color' => $color,
            'lite' => $lite,
            'options' => $options,
        ]);
    }
}
