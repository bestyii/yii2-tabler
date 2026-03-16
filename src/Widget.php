<?php

namespace bestyii\tabler;

/**
 * Widget is the base class for all tabler widgets.
 */
class Widget extends \yii\base\Widget
{
    use TablerWidgetTrait;

    /**
     * @var array HTML attributes for the widget container
     */
    public $options = [];
}
