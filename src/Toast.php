<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Toast extends Widget
{
    /**
     * @var string toast title
     */
    public $title;

    /**
     * @var string toast subtitle (e.g. time ago)
     */
    public $subtitle;

    /**
     * @var string toast body content
     */
    public $body;

    /**
     * @var string icon or element to show beside the title
     */
    public $icon;

    /**
     * @var string avatar URL to show in header
     */
    public $avatar;

    /**
     * @var bool whether to show the close button
     */
    public $showCloseButton = true;

    /**
     * @var bool whether the toast is visible
     */
    public $show = true;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $header = $this->renderHeader();
        $bodyHtml = $this->body ? Html::tag('div', $this->body, ['class' => 'toast-body']) : '';

        return Html::tag('div', $header . "\n" . $bodyHtml, $this->options);
    }

    protected function initOptions(): void
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        Html::addCssClass($this->options, ['widget' => 'toast']);
        if ($this->show) {
            Html::addCssClass($this->options, ['visibility' => 'show']);
        }

        $this->options['role'] = 'alert';
        $this->options['aria-live'] = 'assertive';
        $this->options['aria-atomic'] = 'true';
    }

    protected function renderHeader()
    {
        if ($this->title === null && !$this->showCloseButton) {
            return '';
        }

        $content = '';
        if ($this->avatar) {
            $content .= Html::tag('span', '', [
                'class' => 'avatar avatar-xs me-2',
                'style' => "background-image: url({$this->avatar})"
            ]);
        } elseif ($this->icon) {
            $content .= Html::tag('span', $this->icon, ['class' => 'me-2']);
        }

        if ($this->title) {
            $content .= Html::tag('strong', Html::encode($this->title), ['class' => 'me-auto']);
        }

        if ($this->subtitle) {
            $content .= Html::tag('small', Html::encode($this->subtitle));
        }

        if ($this->showCloseButton) {
            $content .= Html::button('', [
                'type' => 'button',
                'class' => 'ms-2 btn-close',
                'data-bs-dismiss' => 'toast',
                'aria-label' => 'Close'
            ]);
        }

        return Html::tag('div', $content, ['class' => 'toast-header']);
    }
}
