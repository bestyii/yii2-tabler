<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use Yii;

class Modal extends Widget
{
    public $header;
    public $headerOptions = [];
    public $title;
    public $titleOptions = ['class' => 'modal-title'];
    public $closeButton = [];
    public $footer;
    public $footerOptions = [];
    public $size; // 'sm', 'lg', 'xl'
    public $centered = true;
    public $blur = true;
    public $statusColor;
    public $options = [];
    public $dialogOptions = [];

    /**
     * @var string|null the body content for widget() usage.
     */
    public $body;

    /**
     * @var string|null alias for statusColor
     */
    public $status;

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
            $nestedContent .= is_callable($this->body) ? call_user_func($this->body) : $this->body;
        }

        $content = '';
        if ($this->statusColor) {
            $content .= Html::tag('div', '', ['class' => 'modal-status bg-' . $this->statusColor]) . "\n";
        }

        $content .= $this->renderHeader();
        $content .= Html::tag('div', $nestedContent, ['class' => 'modal-body']);
        $content .= $this->renderFooter();

        $modalContent = Html::tag('div', $content, ['class' => 'modal-content']);
        $modalDialog = Html::tag('div', $modalContent, $this->dialogOptions);

        $this->registerPlugin('modal');

        return Html::tag('div', $modalDialog, $this->options);
    }

    protected function initOptions(): void
    {
        if ($this->status !== null) {
            $this->statusColor = $this->status;
        }

        // Widget::init() already sets the ID if not present.

        Html::addCssClass($this->options, ['widget' => 'modal', 'fade' => 'fade']);
        $this->options['tabindex'] = '-1';
        $this->options['role'] = 'dialog';
        $this->options['aria-hidden'] = 'true';

        if ($this->blur) {
            Html::addCssClass($this->options, ['blur' => 'modal-blur']);
        }

        Html::addCssClass($this->dialogOptions, ['widget' => 'modal-dialog']);
        if ($this->size) {
            Html::addCssClass($this->dialogOptions, ['size' => 'modal-' . $this->size]);
        }
        if ($this->centered) {
            Html::addCssClass($this->dialogOptions, ['centered' => 'modal-dialog-centered']);
        }
        $this->dialogOptions['role'] = 'document';

        Html::addCssClass($this->headerOptions, ['widget' => 'modal-header']);
    }

    protected function renderHeader()
    {
        $button = $this->renderCloseButton();
        $headerContent = '';

        if ($button !== null) {
            if ($this->header !== null) {
                $headerContent = $this->header . "\n" . $button;
            } elseif ($this->title !== null) {
                $headerContent = Html::tag('h5', $this->title, $this->titleOptions) . "\n" . $button;
            } else {
                $headerContent = $button;
            }
            return Html::tag('div', $headerContent, $this->headerOptions);
        }

        if ($this->header !== null) {
            return Html::tag('div', $this->header, $this->headerOptions);
        }

        return '';
    }

    protected function renderFooter()
    {
        if ($this->footer !== null) {
            Html::addCssClass($this->footerOptions, ['widget' => 'modal-footer']);
            return Html::tag('div', "\n" . $this->footer . "\n", $this->footerOptions);
        }
        return '';
    }

    protected function renderCloseButton()
    {
        if ($this->closeButton !== false) {
            $options = $this->closeButton;
            Html::addCssClass($options, ['widget' => 'btn-close']);
            $options['data-bs-dismiss'] = 'modal';
            $options['aria-label'] = 'Close';
            if (!isset($options['type'])) {
                $options['type'] = 'button';
            }
            return Html::button('', $options);
        }
        return null;
    }
}
