<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class PageHeader extends Widget
{
    /**
     * @var string the page pre-title
     */
    public $preTitle;

    /**
     * @var string the main page title
     */
    public $title;

    /**
     * @var string page actions (buttons etc.)
     */
    public $actions;

    /**
     * @var string|array the avatar configuration
     */
    public $avatar;

    /**
     * @var string the page subtitle
     */
    public $subtitle;

    /**
     * @var array|string the breadcrumb configuration
     */
    public $breadcrumb;

    /**
     * @var string custom content to display in the main column
     */
    public $content;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $innerContent = '';

        // Avatar column
        if ($this->avatar) {
            $avatarHtml = is_array($this->avatar) ? Avatar::widget($this->avatar) : $this->avatar;
            $innerContent .= Html::tag('div', $avatarHtml, ['class' => 'col-auto']);
        }

        // Main info column
        $mainInfo = '';
        if ($this->breadcrumb) {
            $breadcrumbHtml = is_array($this->breadcrumb) ? Breadcrumbs::widget($this->breadcrumb) : $this->breadcrumb;
            $mainInfo .= Html::tag('div', $breadcrumbHtml, ['class' => 'mb-1']);
        }

        if ($this->preTitle) {
            $mainInfo .= Html::tag('div', Html::encode($this->preTitle), ['class' => 'page-pretitle']);
        }

        if ($this->title) {
            $mainInfo .= Html::tag('h2', Html::encode($this->title), ['class' => 'page-title']);
        }

        if ($this->subtitle) {
            $mainInfo .= Html::tag('div', Html::encode($this->subtitle), ['class' => 'page-subtitle']);
        }

        if ($this->content) {
            $mainInfo .= $this->content;
        }

        $innerContent .= Html::tag('div', $mainInfo, ['class' => 'col']);

        // Actions column
        if ($this->actions) {
            $actionsHtml = '';
            if (is_array($this->actions)) {
                $buttons = [];
                foreach ($this->actions as $action) {
                    if (is_string($action)) {
                        $buttons[] = $action;
                    } else {
                        $label = ArrayHelper::getValue($action, 'label', '');
                        $url = ArrayHelper::getValue($action, 'url', '#');
                        $icon = ArrayHelper::getValue($action, 'icon');
                        $options = ArrayHelper::getValue($action, 'options', ['class' => 'btn btn-primary']);

                        $btnContent = '';
                        if ($icon) {
                            $btnContent .= \bestyii\tabler\Icon::widget(['name' => $icon]) . ' ';
                        }
                        $btnContent .= Html::encode($label);

                        $buttons[] = Html::a($btnContent, $url, $options);
                    }
                }
                $actionsHtml = Html::tag('div', implode("\n", $buttons), ['class' => 'btn-list']);
            } else {
                $actionsHtml = $this->actions;
            }
            $innerContent .= Html::tag('div', $actionsHtml, ['class' => 'col-auto ms-auto d-print-none']);
        }

        $row = Html::tag('div', $innerContent, ['class' => 'row g-2 align-items-center']);
        $containerClass = ArrayHelper::remove($this->options, 'container', 'container-xl');
        $container = Html::tag('div', $row, ['class' => $containerClass]);

        return Html::tag('div', $container, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'page-header d-print-none']);
    }
}
