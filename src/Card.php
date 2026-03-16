<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;


class Card extends Widget
{
    /**
     * @var string the card title
     */
    public $title;

    /**
     * @var string the card subtitle
     */
    public $subtitle;

    /**
     * @var array HTML attributes for the card container tag
     */
    public $options = [];

    /**
     * @var array HTML attributes for the card body tag
     */
    public $bodyOptions = [];

    /**
     * @var array HTML attributes for the card header tag
     */
    public $headerOptions = [];

    /**
     * @var string|array tools area (e.g. buttons) to display in the header
     */
    public $tools;

    /**
     * @var string|null card status color (e.g. 'primary', 'success', 'danger')
     */
    public $statusColor;

    /**
     * @var string card status position: 'top' or 'left'
     */
    public $statusPosition = 'top';

    /**
     * @var string|null|callable the card content.
     */
    public $content;

    /**
     * @var array|null the card ribbon configuration.
     * e.g. ['text' => 'NEW', 'color' => 'blue', 'outside' => false]
     */
    public $ribbon;

    /**
     * @var string the card footer content
     */
    public $footer;

    /**
     * @var array HTML attributes for the card footer tag
     */
    public $footerOptions = [];

    /**
     * @var string|null the card size: 'sm', 'md', 'lg'. Defaults to 'md'.
     */
    public $size;

    /**
     * @var bool whether the card should be stacked
     */
    public $stacked = false;

    /**
     * @var bool whether the card should be flush
     */
    public $flush = false;

    /**
     * @var bool whether the card should be borderless
     */
    public $borderless = false;

    /**
     * @var bool whether to wrap the content in a card-body. Defaults to true.
     */
    public $body = true;

    /**
     * @var string|array image configuration. 
     * If string, it's the URL. If array, it can have 'src', 'position' ('top', 'bottom'), and 'options'.
     */
    public $image;

    /**
     * @var string image start (left) URL for horizontal card
     */
    public $imageStart;

    /**
     * @var string image end (right) URL for horizontal card
     */
    public $imageEnd;

    /**
     * @var bool whether the card is in loading state
     */
    public $loading = false;

    /**
     * @var array tabs configuration for card header
     */
    public $tabs = [];

    /**
     * @var array|null the card stamp configuration.
     * e.g. ['icon' => 'star', 'color' => 'yellow', 'textColor' => 'white']
     */
    public $stamp;

    /**
     * @var bool whether the card is active
     */
    public $active = false;

    /**
     * @var bool whether the card is inactive
     */
    public $inactive = false;

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
        
        $content = '';
        if ($this->loading) {
            $content .= Html::tag('div', '', ['class' => 'progress progress-sm card-progress']) . "\n";
        }

        $content .= $this->renderStatus();
        $content .= $this->renderRibbon();
        $content .= $this->renderStamp();
        $content .= $this->renderImage('top');
        $content .= $this->renderHeader();

        $bodyContent = '';
        if ($this->content) {
            $bodyContent .= is_callable($this->content) ? call_user_func($this->content) : $this->content;
        }
        $bodyContent .= $nestedContent;

        $innerContent = '';
        if ($this->imageStart || $this->imageEnd) {
            $rowOptions = ['class' => 'row g-0'];
            $cols = [];
            
            if ($this->imageStart) {
                $cols[] = Html::tag('div', Html::tag('div', '', ['class' => 'card-img-start', 'style' => "background-image: url({$this->imageStart})"]), ['class' => 'col-3']);
            }
            
            $mainColContent = $this->body ? Html::tag('div', $bodyContent, $this->bodyOptions) : $bodyContent;
            $cols[] = Html::tag('div', $mainColContent, ['class' => 'col']);
            
            if ($this->imageEnd) {
                $cols[] = Html::tag('div', Html::tag('div', '', ['class' => 'card-img-end', 'style' => "background-image: url({$this->imageEnd})"]), ['class' => 'col-3']);
            }
            
            $innerContent = Html::tag('div', implode("\n", $cols), $rowOptions);
        } else {
            $innerContent = $this->body ? Html::tag('div', $bodyContent, $this->bodyOptions) : $bodyContent;
        }

        $content .= $innerContent;
        $content .= $this->renderImage('bottom');

        if ($this->footer) {
            $content .= Html::tag('div', $this->footer, $this->footerOptions);
        }

        $this->registerPlugin();

        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'card']);

        if ($this->size) {
            Html::addCssClass($this->options, "card-{$this->size}");
        }
        if ($this->stacked) {
            Html::addCssClass($this->options, 'card-stacked');
        }
        if ($this->flush) {
            Html::addCssClass($this->options, 'card-flush');
        }
        if ($this->borderless) {
            Html::addCssClass($this->options, 'card-borderless');
        }
        if ($this->active) {
            Html::addCssClass($this->options, 'card-active');
        }
        if ($this->inactive) {
            Html::addCssClass($this->options, 'card-inactive');
        }

        Html::addCssClass($this->bodyOptions, ['widget' => 'card-body']);
        Html::addCssClass($this->headerOptions, ['widget' => 'card-header']);
        Html::addCssClass($this->footerOptions, ['widget' => 'card-footer']);
    }

    protected function renderImage($position)
    {
        if (!$this->image) {
            return '';
        }

        $src = is_array($this->image) ? ArrayHelper::getValue($this->image, 'src') : $this->image;
        $pos = is_array($this->image) ? ArrayHelper::getValue($this->image, 'position', 'top') : 'top';
        $options = is_array($this->image) ? ArrayHelper::getValue($this->image, 'options', []) : [];

        if ($pos !== $position) {
            return '';
        }

        Html::addCssClass($options, "card-img-{$pos}");
        return Html::img($src, $options) . "\n";
    }

    protected function renderRibbon()
    {
        if (!$this->ribbon) {
            return '';
        }

        $text = ArrayHelper::getValue($this->ribbon, 'text', '');
        $color = ArrayHelper::getValue($this->ribbon, 'color', 'blue');
        $outside = ArrayHelper::getValue($this->ribbon, 'outside', false);
        $top = ArrayHelper::getValue($this->ribbon, 'top', false);

        $class = 'ribbon bg-' . $color;
        if ($outside) {
            $class .= ' ribbon-outside';
        }
        if ($top) {
            $class .= ' ribbon-top';
        }
        return Html::tag('div', $text, ['class' => $class]) . "\n";
    }

    protected function renderStatus()
    {
        if ($this->statusColor) {
            $class = 'card-status-' . $this->statusPosition . ' bg-' . $this->statusColor;
            return Html::tag('div', '', ['class' => $class]) . "\n";
        }
        return '';
    }

    protected function renderStamp()
    {
        if (!$this->stamp) {
            return '';
        }

        $icon = ArrayHelper::getValue($this->stamp, 'icon');
        $color = ArrayHelper::getValue($this->stamp, 'color', 'primary');
        $textColor = ArrayHelper::getValue($this->stamp, 'textColor', '');

        $stampClass = 'card-stamp-icon bg-' . $color;
        if ($textColor) {
            $stampClass .= ' text-' . $textColor;
        }

        $iconHtml = $icon ? Icon::widget(['name' => $icon]) : '';
        
        return Html::tag('div', Html::tag('div', $iconHtml, ['class' => $stampClass]), ['class' => 'card-stamp']) . "\n";
    }

    protected function renderHeader()
    {
        if ($this->title === null && $this->tools === null && $this->subtitle === null && empty($this->tabs)) {
            return '';
        }

        $headerContent = '';

        if (!empty($this->tabs)) {
            $items = '';
            foreach ($this->tabs as $tab) {
                $label = ArrayHelper::getValue($tab, 'label', '');
                $active = ArrayHelper::getValue($tab, 'active', false);
                $url = ArrayHelper::getValue($tab, 'url', '#');
                $itemOptions = ArrayHelper::getValue($tab, 'options', []);

                Html::addCssClass($itemOptions, 'nav-item');
                $linkOptions = ['class' => 'nav-link' . ($active ? ' active' : '')];
                if (strpos($url, '#') === 0) {
                    $linkOptions['data-bs-toggle'] = 'tab';
                }

                $items .= Html::tag('li', Html::a($label, $url, $linkOptions), $itemOptions);
            }
            $headerContent .= Html::tag('ul', $items, ['class' => 'nav nav-tabs card-header-tabs', 'data-bs-toggle' => 'tabs']);
        } else {
            $titleSection = '';
            if ($this->title !== null) {
                $titleSection .= Html::tag('h3', $this->title, ['class' => 'card-title']);
            }
            if ($this->subtitle !== null) {
                $titleSection .= Html::tag('p', $this->subtitle, ['class' => 'card-subtitle']);
            }
            $headerContent .= Html::tag('div', $titleSection);
        }

        if ($this->tools !== null) {
            $toolsHtml = '';
            if (is_array($this->tools)) {
                $buttons = [];
                foreach ($this->tools as $tool) {
                    if (is_string($tool)) {
                        $buttons[] = $tool;
                    } else {
                        $label = ArrayHelper::getValue($tool, 'label', '');
                        $url = ArrayHelper::getValue($tool, 'url', '#');
                        $icon = ArrayHelper::getValue($tool, 'icon');
                        $options = ArrayHelper::getValue($tool, 'options', ['class' => 'btn btn-sm btn-light']);

                        $btnContent = '';
                        if ($icon) {
                            $btnContent .= \bestyii\tabler\Icon::widget(['name' => $icon]) . ' ';
                        }
                        $btnContent .= $label;

                        $buttons[] = Html::a($btnContent, $url, $options);
                    }
                }
                $toolsHtml = Html::tag('div', implode("\n", $buttons), ['class' => 'btn-list']);
            } else {
                $toolsHtml = $this->tools;
            }
            $headerContent .= Html::tag('div', $toolsHtml, ['class' => 'card-actions']);
        }

        return Html::tag('div', $headerContent, $this->headerOptions) . "\n";
    }
}
