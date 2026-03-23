<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\base\InvalidConfigException;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class LinkPager extends Widget
{
    public ?Pagination $pagination = null;
    public array $options = [
        'aria-label' => 'Pagination navigation',
    ];
    public array $listOptions = [
        'class' => ['pagination'],
    ];
    public array $linkContainerOptions = [
        'class' => ['page-item'],
    ];
    public array $linkOptions = [
        'class' => ['page-link'],
    ];
    public string $pageCssClass = 'page-item';
    public string $firstPageCssClass = 'first';
    public string $lastPageCssClass = 'last';
    public string $prevPageCssClass = 'prev';
    public string $nextPageCssClass = 'next';
    public string $activePageCssClass = 'active';
    public string $disabledPageCssClass = 'disabled';
    public array $disabledListItemSubTagOptions = [];
    public int $maxButtonCount = 10;
    public string|bool $nextPageLabel = '<span aria-hidden="true">&raquo;</span>';
    public string|bool $prevPageLabel = '<span aria-hidden="true">&laquo;</span>';
    public string|bool $firstPageLabel = false;
    public string|bool $lastPageLabel = false;
    public bool $registerLinkTags = false;
    public bool $hideOnSinglePage = true;
    public bool $disableCurrentPageButton = false;

    /**
     * @throws InvalidConfigException
     */
    public function init(): void
    {
        parent::init();
        if ($this->pagination === null) {
            throw new InvalidConfigException('The "pagination" property must be set.');
        }
    }

    public function run(): string
    {
        if ($this->registerLinkTags) {
            $this->registerPaginationLinkTags();
        }

        $buttons = $this->renderPageButtons();
        if ($buttons === '') {
            return '';
        }

        return Html::tag(ArrayHelper::remove($this->options, 'tag', 'nav'), $buttons, $this->options);
    }

    protected function renderPageButtons(): string
    {
        $pageCount = $this->pagination->getPageCount();
        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }

        $buttons = [];
        $currentPage = $this->pagination->getPage();

        $firstPageLabel = $this->firstPageLabel === true ? '1' : $this->firstPageLabel;
        if ($firstPageLabel !== false) {
            $buttons[] = $this->renderPageButton($firstPageLabel, 0, $this->firstPageCssClass, $currentPage <= 0, false);
        }

        if ($this->prevPageLabel !== false) {
            $page = max($currentPage - 1, 0);
            $buttons[] = $this->renderPageButton($this->prevPageLabel, $page, $this->prevPageCssClass, $currentPage <= 0, false);
        }

        [$beginPage, $endPage] = $this->getPageRange();
        for ($page = $beginPage; $page <= $endPage; ++$page) {
            $buttons[] = $this->renderPageButton(
                (string) ($page + 1),
                $page,
                '',
                $this->disableCurrentPageButton && $page === $currentPage,
                $page === $currentPage,
            );
        }

        if ($this->nextPageLabel !== false) {
            $page = min($currentPage + 1, $pageCount - 1);
            $buttons[] = $this->renderPageButton($this->nextPageLabel, $page, $this->nextPageCssClass, $currentPage >= $pageCount - 1, false);
        }

        $lastPageLabel = $this->lastPageLabel === true ? (string) $pageCount : $this->lastPageLabel;
        if ($lastPageLabel !== false) {
            $buttons[] = $this->renderPageButton($lastPageLabel, $pageCount - 1, $this->lastPageCssClass, $currentPage >= $pageCount - 1, false);
        }

        return Html::tag(ArrayHelper::remove($this->listOptions, 'tag', 'ul'), implode("\n", $buttons), $this->listOptions);
    }

    protected function renderPageButton(string $label, int $page, string $class, bool $disabled, bool $active): string
    {
        $options = $this->linkContainerOptions;
        $tag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, $class === '' ? $this->pageCssClass : $class);

        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
            $options['aria-current'] = 'page';
        }

        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);
        }

        if ($disabled || $active) {
            $disabledOptions = array_merge($this->linkOptions, $this->disabledListItemSubTagOptions);
            $disabledTag = ArrayHelper::remove($disabledOptions, 'tag', 'span');

            return Html::tag($tag, Html::tag($disabledTag, $label, $disabledOptions), $options);
        }

        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        return Html::tag($tag, Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
    }

    protected function getPageRange(): array
    {
        $currentPage = $this->pagination->getPage();
        $pageCount = $this->pagination->getPageCount();

        $beginPageOffset = $this->maxButtonCount > 2 ? (int) ($this->maxButtonCount / 2) : 0;
        $beginPage = max(0, $currentPage - $beginPageOffset);
        $endPage = $beginPage + $this->maxButtonCount - 1;
        if ($endPage >= $pageCount) {
            $endPage = $pageCount - 1;
            $beginPage = max(0, $endPage - $this->maxButtonCount + 1);
        }

        return [$beginPage, $endPage];
    }

    private function registerPaginationLinkTags(): void
    {
        foreach ($this->pagination->getLinks() as $rel => $href) {
            $this->getView()->registerLinkTag([
                'rel' => $rel,
                'href' => $href,
            ], $rel);
        }
    }
}
