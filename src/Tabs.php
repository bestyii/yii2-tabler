<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

class Tabs extends Widget
{
    /**
     * @var array list of tabs. Each item is an array with 'label', 'content', 'active', 'options', 'linkOptions', 'headerOptions'
     */
    public $items = [];

    /**
     * @var string visual style: 'nav-tabs' or 'nav-pills'
     */
    public $navType = 'nav-tabs';

    /**
     * @var bool whether to render as card tabs
     */
    public $card = false;

    /**
     * @var array HTML attributes for the nav container
     */
    public $options = [];

    /**
     * @var array HTML attributes for the tab content container
     */
    public $tabContentOptions = [];

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $navs = [];
        $panes = [];

        foreach ($this->items as $i => $item) {
            if (!isset($item['label'])) {
                continue;
            }
            $headerOptions = ArrayHelper::getValue($item, 'headerOptions', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
            $options = ArrayHelper::getValue($item, 'options', []);

            Html::addCssClass($headerOptions, 'nav-item');
            Html::addCssClass($linkOptions, 'nav-link');

            $id = ArrayHelper::getValue($options, 'id', $this->getId() . '-tab' . $i);
            $options['id'] = $id;

            $linkOptions['data-bs-toggle'] = 'tab';
            $linkOptions['href'] = '#' . $id;
            $linkOptions['role'] = 'tab';

            if (ArrayHelper::getValue($item, 'active')) {
                Html::addCssClass($linkOptions, 'active');
                Html::addCssClass($options, 'active show');
            }

            Html::addCssClass($options, ['widget' => 'tab-pane']);
            $options['role'] = 'tabpanel';

            $navs[] = Html::tag('li', Html::a($item['label'], '#' . $id, $linkOptions), $headerOptions);

            if (isset($item['content'])) {
                $panes[] = Html::tag('div', $item['content'], $options);
            }
        }

        $navHtml = Html::tag('ul', implode("\n", $navs), $this->options);
        $contentHtml = Html::tag('div', implode("\n", $panes), $this->tabContentOptions);

        return $navHtml . "\n" . $contentHtml;
    }

    protected function initOptions(): void
    {
        Html::addCssClass($this->options, ['widget' => 'nav', $this->navType]);

        if ($this->card) {
            Html::addCssClass($this->options, 'card-header-tabs');
        }

        Html::addCssClass($this->tabContentOptions, 'tab-content');
    }
}
