<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\Concerns\HasPresetStaticCalls;
use bestyii\tabler\Concerns\HasTablerColorPresetShortcuts;
use yii\helpers\Html;

/**
 * @method static string primary(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string secondary(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string success(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string info(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string warning(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string danger(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string blue(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string azure(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string indigo(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string purple(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string pink(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string red(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string orange(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string yellow(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string lime(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string green(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string teal(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string cyan(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 * @method static string dark(?string $text = null, ?string $icon = null, ?string $placement = null, bool $bookmark = false, bool $encodeText = true, array $options = [])
 */
class Ribbon extends Widget
{
    use HasPresetStaticCalls;
    use HasTablerColorPresetShortcuts;

    public ?string $text = null;
    public ?string $icon = null;
    public ?string $color = null;
    public ?string $placement = null;
    public bool $bookmark = false;
    public bool $encodeText = true;
    public array $options = [];

    /**
     * Typed alternative to widget([...]) for the common ribbon case.
     * Prefer named arguments when the color or placement is dynamic.
     */
    public static function make(
        string $color,
        ?string $text = null,
        ?string $icon = null,
        ?string $placement = null,
        bool $bookmark = false,
        bool $encodeText = true,
        array $options = [],
    ): string {
        return static::widget([
            'text' => $text,
            'icon' => $icon,
            'color' => $color,
            'placement' => $placement,
            'bookmark' => $bookmark,
            'encodeText' => $encodeText,
            'options' => $options,
        ]);
    }

    public function run(): string
    {
        Html::addCssClass($this->options, 'ribbon');

        if ($this->placement !== null && $this->placement !== '') {
            foreach (array_filter(explode('-', $this->placement)) as $modifier) {
                Html::addCssClass($this->options, 'ribbon-' . $modifier);
            }
        }
        if ($this->bookmark) {
            Html::addCssClass($this->options, 'ribbon-bookmark');
        }
        if ($this->color !== null && $this->color !== '') {
            Html::addCssClass($this->options, 'bg-' . $this->color);
        }

        $content = '';
        if ($this->icon !== null && $this->icon !== '') {
            $content .= Icon::widget([
                'name' => $this->icon,
                'options' => [
                    'class' => $this->text !== null && $this->text !== '' ? 'me-1' : '',
                ],
            ]);
        }
        if ($this->text !== null && $this->text !== '') {
            $content .= $this->encodeText ? Html::encode($this->text) : $this->text;
        }

        if ($content === '') {
            return '';
        }

        return Html::tag('div', $content, $this->options);
    }
}
