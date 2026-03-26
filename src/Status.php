<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\Concerns\HasPresetStaticCalls;
use bestyii\tabler\Concerns\HasTablerColorPresetShortcuts;
use yii\helpers\Html;

/**
 * @method static string primary(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string secondary(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string success(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string info(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string warning(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string danger(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string blue(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string azure(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string indigo(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string purple(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string pink(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string red(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string orange(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string yellow(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string lime(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string green(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string teal(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string cyan(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 * @method static string dark(?string $text = null, bool $showDot = true, bool $encodeText = true, array $options = [])
 */
class Status extends Widget
{
    use HasPresetStaticCalls;
    use HasTablerColorPresetShortcuts;

    public ?string $text = null;
    public string $color = 'green';
    public bool $showDot = true;
    public bool $encodeText = true;
    public array $options = [];

    /**
     * Typed alternative to widget([...]) for the common single-status case.
     * Prefer named arguments when the color or label is assembled dynamically.
     */
    public static function make(
        string $color,
        ?string $text = null,
        bool $showDot = true,
        bool $encodeText = true,
        array $options = [],
    ): string {
        return static::widget([
            'text' => $text,
            'color' => $color,
            'showDot' => $showDot,
            'encodeText' => $encodeText,
            'options' => $options,
        ]);
    }

    public function run(): string
    {
        Html::addCssClass($this->options, [
            'status' => 'status',
            'color' => 'status-' . $this->color,
        ]);

        $content = '';
        if ($this->showDot) {
            $content .= Html::tag('span', '', [
                'class' => 'status-dot bg-' . $this->color,
            ]);
        }

        if ($this->text !== null && $this->text !== '') {
            $content .= Html::tag(
                'span',
                $this->encodeText ? Html::encode($this->text) : $this->text,
                [
                    'class' => 'status-text',
                ],
            );
        }

        return Html::tag('span', $content, $this->options);
    }
}
