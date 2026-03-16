<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;


class Offcanvas extends Widget
{
    /**
     * @var string the title of the offcanvas
     */
    public $title;

    /**
     * @var string the body content
     */
    public $body;

    /**
     * @var string placement of the offcanvas component: 'start', 'end', 'top', 'bottom'
     */
    public $placement = 'end';

    /**
     * @var bool whether to put a backdrop blur
     */
    public $blur = true;

    /**
     * @var array HTML attributes for the offcanvas container
     */
    public $options = [];

    public function init(): void
    {
        parent::init();
        $this->initOptions();

        ob_start();
        ob_implicit_flush(false);
    }

    public function run()
    {
        $nestedContent = ob_get_clean();
        if ($this->body !== null) {
            $nestedContent .= $this->body;
        }

        $content = '';
        if ($this->title !== null) {
            $content .= $this->renderHeader() . "\n";
        }

        $content .= Html::tag('div', $nestedContent, ['class' => 'offcanvas-body']) . "\n";

        $this->registerPlugin('offcanvas');

        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'offcanvas', 'placement' => 'offcanvas-' . $this->placement]);
        $this->options['tabindex'] = '-1';
        $this->options['aria-labelledby'] = $this->options['id'] . '-title';

        if ($this->blur) {
            $this->options['data-bs-backdrop'] = 'true';
            Html::addCssClass($this->options, ['blur' => 'offcanvas-blur']);
        }
    }

    protected function renderHeader()
    {
        $titleBlock = Html::tag('h2', $this->title, ['class' => 'offcanvas-title', 'id' => $this->options['id'] . '-title']);
        $closeButton = Html::button('', [
            'type' => 'button',
            'class' => 'btn-close text-reset',
            'data-bs-dismiss' => 'offcanvas',
            'aria-label' => 'Close'
        ]);

        return Html::tag('div', "\n" . $titleBlock . "\n" . $closeButton . "\n", ['class' => 'offcanvas-header']);
    }
}
