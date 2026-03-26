<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\Concerns\HasPresetStaticCalls;
use bestyii\tabler\Concerns\HasTablerColorPresetShortcuts;
use yii\helpers\Html;

/**
 * @method static string primary(bool $animated = false, array $options = [])
 * @method static string secondary(bool $animated = false, array $options = [])
 * @method static string success(bool $animated = false, array $options = [])
 * @method static string info(bool $animated = false, array $options = [])
 * @method static string warning(bool $animated = false, array $options = [])
 * @method static string danger(bool $animated = false, array $options = [])
 * @method static string blue(bool $animated = false, array $options = [])
 * @method static string azure(bool $animated = false, array $options = [])
 * @method static string indigo(bool $animated = false, array $options = [])
 * @method static string purple(bool $animated = false, array $options = [])
 * @method static string pink(bool $animated = false, array $options = [])
 * @method static string red(bool $animated = false, array $options = [])
 * @method static string orange(bool $animated = false, array $options = [])
 * @method static string yellow(bool $animated = false, array $options = [])
 * @method static string lime(bool $animated = false, array $options = [])
 * @method static string green(bool $animated = false, array $options = [])
 * @method static string teal(bool $animated = false, array $options = [])
 * @method static string cyan(bool $animated = false, array $options = [])
 * @method static string dark(bool $animated = false, array $options = [])
 */
class StatusIndicator extends Widget
{
    use HasPresetStaticCalls;
    use HasTablerColorPresetShortcuts;

    public ?string $color = null;
    public bool $animated = false;
    public array $options = [];

    /**
     * Typed alternative to widget([...]) for the three-dot activity indicator.
     */
    public static function make(string $color, bool $animated = false, array $options = []): string
    {
        return static::widget([
            'color' => $color,
            'animated' => $animated,
            'options' => $options,
        ]);
    }

    public function run(): string
    {
        Html::addCssClass($this->options, 'status-indicator');
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'status-' . $this->color);
        }
        if ($this->animated) {
            Html::addCssClass($this->options, 'status-indicator-animated');
        }

        $circle = Html::tag('span', '', [
            'class' => 'status-indicator-circle',
        ]);

        return Html::tag('span', $circle . $circle . $circle, $this->options);
    }
}
