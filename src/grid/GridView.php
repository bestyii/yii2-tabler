<?php

namespace bestyii\tabler\grid;

use yii\grid\GridView as BaseGridView;
use yii\helpers\Html;
use bestyii\tabler\Card;
use yii\helpers\ArrayHelper;

class GridView extends BaseGridView
{
    /**
     * @var array the HTML attributes for the grid table element.
     */
    public $tableOptions = ['class' => 'table card-table table-vcenter text-nowrap'];

    /**
     * @var array the HTML attributes for the container tag of the grid view.
     */
    public $options = ['class' => 'card'];

    /**
     * @var string the layout that determines how different sections of the grid view should be organized.
     */
    public $layout = "{items}\n<div class=\"card-footer d-flex align-items-center\">{summary}\n{pager}</div>";

    /**
     * @var array the configuration for the pager widget.
     */
    public $pager = [
        'class' => \bestyii\tabler\LinkPager::class,
    ];

    /**
     * @var bool whether the table should be wrapped in a responsive wrapper
     */
    public $responsive = true;

    /**
     * @var bool whether to render card header
     */
    public $renderCardHeader = false;

    /**
     * @var string the title for the card header
     */
    public $cardTitle = '';

    /**
     * @var string the title for the card header (alias for cardTitle)
     */
    public $title;

    /**
     * @var bool whether to use hover effect on table rows
     */
    public $hover = true;

    /**
     * @var bool whether to use striped effect on table rows
     */
    public $striped = false;

    /**
     * @var bool whether to use outline effect on table
     */
    public $outline = false;

    public function init(): void
    {
        parent::init();
        if ($this->title !== null) {
            $this->cardTitle = $this->title;
            $this->renderCardHeader = true;
        } elseif ($this->cardTitle) {
            $this->renderCardHeader = true;
        }

        if ($this->hover) {
            Html::addCssClass($this->tableOptions, 'table-hover');
        }
        if ($this->striped) {
            Html::addCssClass($this->tableOptions, 'table-striped');
        }
        if ($this->outline) {
            Html::addCssClass($this->tableOptions, 'table-outline');
        }
    }

    public function renderItems()
    {
        $items = parent::renderItems();

        if ($this->responsive) {
            $items = Html::tag('div', $items, ['class' => 'table-responsive']);
        }

        if ($this->renderCardHeader && $this->cardTitle) {
            $header = Html::tag('div', Html::tag('h3', $this->cardTitle, ['class' => 'card-title']), ['class' => 'card-header']);
            $items = $header . "\n" . $items;
        }

        return $items;
    }
}
