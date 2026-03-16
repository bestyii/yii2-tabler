<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\widgets\LinkPager as BaseLinkPager;

class LinkPager extends BaseLinkPager
{
    public $options = ['class' => 'pagination m-0 ms-auto'];

    public $linkContainerOptions = ['class' => 'page-item'];

    public $linkOptions = ['class' => 'page-link'];

    public $disabledListItemSubTagOptions = ['class' => 'page-link'];

    public $prevPageCssClass = 'page-item';

    public $nextPageCssClass = 'page-item';

    public $activePageCssClass = 'active';

    public $disabledPageCssClass = 'disabled';

    public $nextPageLabel = 'next<span class="ms-1" aria-hidden="true">&raquo;</span>';

    public $prevPageLabel = '<span class="me-1" aria-hidden="true">&laquo;</span>prev';

    public function init(): void
    {
        parent::init();

        $this->nextPageLabel = \bestyii\tabler\Icon::widget(['name' => 'chevron-right']) . ' <span class="d-none d-sm-inline-block">Next</span>';
        $this->prevPageLabel = \bestyii\tabler\Icon::widget(['name' => 'chevron-left']) . ' <span class="d-none d-sm-inline-block">Prev</span>';
    }
}
