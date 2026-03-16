<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;


class Alert extends Widget
{
    /**
     * @var string the body content of the alert
     */
    public $body;

    /**
     * @var string the title of the alert
     */
    public $title;

    /**
     * @var string the alert type: 'success', 'warning', 'danger', 'info'
     */
    public $type = 'info';

    /**
     * @var string tabler icon name
     */
    public $icon;

    /**
     * @var bool whether the alert is important (alert-important)
     */
    public $isImportant = false;

    /**
     * @var bool whether the alert is dismissible
     */
    public $isDismissible = true;

    /**
     * @var array|string avatar configuration or raw HTML
     */
    public $avatar;

    /**
     * @var bool whether to show a horizontal divider between title and body
     */
    public $divider = false;

    /**
     * @var string status position: 'top' or 'start'
     */
    public $status;

    /**
     * @var array HTML attributes for the alert container
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
        $body = ob_get_clean();
        if ($this->body) {
            $body .= $this->body;
        }

        $content = '';
        if ($this->icon || $this->avatar) {
            $mediaHtml = '';
            if ($this->avatar) {
                $avatarConfig = is_array($this->avatar) ? $this->avatar : ['src' => $this->avatar];
                $mediaHtml = Html::tag('div', \bestyii\tabler\Avatar::widget($avatarConfig), ['class' => 'alert-icon']);
            } elseif ($this->icon) {
                $mediaHtml = Html::tag('div', \bestyii\tabler\Icon::widget(['name' => $this->icon]), ['class' => 'alert-icon']);
            }
            $content = Html::tag('div', $mediaHtml . Html::tag('div', $this->renderBody($body)), ['class' => 'd-flex']);
        } else {
            $content = $this->renderBody($body);
        }

        if ($this->isDismissible) {
            $content .= Html::button('', [
                'class' => 'btn-close',
                'data-bs-dismiss' => 'alert',
                'aria-label' => 'close'
            ]);
        }

        $this->registerPlugin('alert');

        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'alert']);

        if ($this->type) {
            Html::addCssClass($this->options, ['type' => 'alert-' . $this->type]);
        }

        if ($this->isImportant) {
            Html::addCssClass($this->options, ['important' => 'alert-important']);
        }

        if ($this->isDismissible) {
            Html::addCssClass($this->options, ['dismissible' => 'alert-dismissible']);
            $this->options['role'] = 'alert';
        }

        if ($this->status) {
            Html::addCssClass($this->options, ['status' => 'alert-status-' . $this->status]);
        }
    }

    protected function renderBody($bodyContent)
    {
        $content = '';
        if ($this->title) {
            $content .= Html::tag('h4', $this->title, ['class' => 'alert-title']);
        }

        if ($this->divider && $this->title && $bodyContent) {
            $content .= Html::tag('hr');
        }

        if ($bodyContent) {
            $content .= Html::tag('div', $bodyContent, ['class' => 'text-secondary']);
        }
        return $content;
    }
}
