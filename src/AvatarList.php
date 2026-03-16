<?php

namespace bestyii\tabler;

use yii\helpers\Html;

/**
 * AvatarList renders a list of avatars.
 */
class AvatarList extends Widget
{
    /**
     * @var array list of avatar configurations.
     */
    public $items = [];

    /**
     * @var bool whether the avatars should be stacked
     */
    public $stacked = false;

    /**
     * @var string size of the avatars in the list: 'xs', 'sm', 'md', 'lg', 'xl'
     */
    public $size;

    public function init(): void
    {
        parent::init();
        $this->initOptions();

        ob_start();
        ob_implicit_flush(false);
    }

    public function run()
    {
        $content = ob_get_clean();
        if (!empty($this->items)) {
            foreach ($this->items as $item) {
                if (is_string($item)) {
                    $content .= $item;
                } else {
                    $content .= Avatar::widget($item);
                }
            }
        }

        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'avatar-list']);

        if ($this->stacked) {
            Html::addCssClass($this->options, ['stacked' => 'avatar-list-stacked']);
        }

        if ($this->size) {
            Html::addCssClass($this->options, ['size' => 'avatar-list-' . $this->size]);
        }
    }
}
