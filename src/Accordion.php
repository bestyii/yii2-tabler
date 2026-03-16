<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

class Accordion extends Widget
{
    /**
     * @var array list of accordion items. Each item is an array:
     * - title: string, the header title
     * - content: string, the body content
     * - active: bool, whether the item is expanded by default
     * - options: array, HTML attributes for the accordion-item
     */
    public $items = [];

    /**
     * @var array HTML attributes for the accordion container
     */
    public $options = [];

    /**
     * @var string the HTML tag for the accordion header
     */
    public $headerTag = 'h2';

    /**
     * @var string the icon name for the accordion toggle (chevron-down is default)
     */
    public $toggleIcon = 'chevron-down';

    /**
     * @var bool whether to use the flush version
     */
    public $flush = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $content = '';
        foreach ($this->items as $index => $item) {
            $content .= $this->renderItem($index, $item);
        }
        return Html::tag('div', $content, $this->options);
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'accordion']);
        if ($this->flush) {
            Html::addCssClass($this->options, ['flush' => 'accordion-flush']);
        }
    }

    protected function renderItem($index, $item)
    {
        $options = ArrayHelper::getValue($item, 'options', []);
        Html::addCssClass($options, 'accordion-item');

        $title = ArrayHelper::getValue($item, 'title', '');
        $body = ArrayHelper::getValue($item, 'content', '');
        $isActive = ArrayHelper::getValue($item, 'active', false);
        $icon = ArrayHelper::getValue($item, 'icon');
        $itemToggleIcon = ArrayHelper::getValue($item, 'toggleIcon', $this->toggleIcon);

        $itemId = $this->options['id'] . '-item-' . $index;
        $collapseId = $this->options['id'] . '-collapse-' . $index;

        $buttonOptions = [
            'class' => 'accordion-button' . ($isActive ? '' : ' collapsed'),
            'type' => 'button',
            'data-bs-toggle' => 'collapse',
            'data-bs-target' => '#' . $collapseId,
            'aria-expanded' => $isActive ? 'true' : 'false',
        ];

        // Item icon (optional)
        $iconHtml = '';
        if ($icon) {
            $iconHtml = \bestyii\tabler\Icon::widget(['name' => $icon, 'options' => ['class' => 'me-2']]);
        }

        // Tabler specific toggle icon
        $toggleIconHtml = '';
        if ($itemToggleIcon) {
            $toggleIconHtml = Html::tag('div', \bestyii\tabler\Icon::widget(['name' => $itemToggleIcon]), ['class' => 'accordion-button-toggle']);
        }

        $buttonContent = $iconHtml . $title . $toggleIconHtml;

        $headerHtml = Html::tag($this->headerTag, Html::button($buttonContent, $buttonOptions), ['class' => 'accordion-header', 'id' => $itemId]);

        $collapseOptions = [
            'id' => $collapseId,
            'class' => 'accordion-collapse collapse' . ($isActive ? ' show' : ''),
            'data-bs-parent' => '#' . $this->options['id']
        ];

        $bodyOptions = ArrayHelper::getValue($item, 'bodyOptions', []);
        Html::addCssClass($bodyOptions, 'accordion-body');

        $bodyHtml = Html::tag('div', Html::tag('div', $body, $bodyOptions), $collapseOptions);

        return Html::tag('div', $headerHtml . "\n" . $bodyHtml, $options);
    }
}
