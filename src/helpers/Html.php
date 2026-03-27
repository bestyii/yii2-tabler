<?php

declare(strict_types=1);

namespace bestyii\tabler\helpers;

use yii\helpers\Html as BaseHtml;

/**
 * Html is an enhanced version of [[\yii\helpers\Html]] that provides additional helper methods.
 *
 * It is primarily used to generate Tabler-specific HTML or provide cleaner syntax for common tags.
 */
class Html extends BaseHtml
{
    /**
     * Generates a div tag.
     *
     * @param string $content the tag content.
     * @param array $options the tag options.
     * @return string the generated div tag.
     * @see tag()
     */
    public static function div(string $content = '', array $options = []): string
    {
        return static::tag('div', $content, $options);
    }

    /**
     * Generates a span tag.
     *
     * @param string $content the tag content.
     * @param array $options the tag options.
     * @return string the generated span tag.
     * @see tag()
     */
    public static function span(string $content = '', array $options = []): string
    {
        return static::tag('span', $content, $options);
    }
}
