<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

class Breadcrumbs extends Widget
{
    /**
     * @var array list of links to appear in the breadcrumbs.
     * Each item can be a string (label) or an array ['label' => '...', 'url' => '...'].
     */
    public $links = [];

    /**
     * @var string|array the home link. Can be an array with 'label' and 'url', or a string (label), or false to hide.
     * Default is `['label' => 'Home', 'url' => Yii::$app->homeUrl]`.
     */
    public $homeLink;

    /**
     * @var array HTML attributes for the ol element.
     */
    public $options = ['class' => 'breadcrumb'];

    /**
     * @var array HTML attributes for the nav wrapper element.
     */
    public $navOptions = ['aria-label' => 'breadcrumbs'];

    /**
     * @var string alternative separator type (e.g. 'arrows', 'bullets', 'dots')
     */
    public $type;

    /**
     * @var bool whether to use muted style
     */
    public $muted = false;

    /**
     * @var bool|string whether to show an icon in the home link. If true, uses 'home' icon.
     */
    public $homeIcon = false;

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        if (empty($this->links) && $this->homeLink === false) {
            return '';
        }

        $links = [];
        if ($this->homeLink === null) {
            $homeLink = [
                'label' => \Yii::t('yii', 'Home'),
                'url' => \Yii::$app->homeUrl,
            ];
            if ($this->homeIcon) {
                $homeLink['icon'] = $this->homeIcon === true ? 'home' : $this->homeIcon;
            }
            $links[] = $this->renderItem($homeLink);
        } elseif ($this->homeLink !== false) {
            $links[] = $this->renderItem($this->homeLink);
        }

        foreach ($this->links as $link) {
            if (!is_array($link)) {
                $link = ['label' => $link];
            }
            $links[] = $this->renderItem($link, empty($link['url']));
        }

        $content = Html::tag('ol', implode("\n", $links), $this->options);
        return Html::tag('nav', $content, $this->navOptions);
    }

    protected function initOptions(): void
    {
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'breadcrumb';
        }
        Html::addCssClass($this->options, ['widget' => 'breadcrumb']);
        if ($this->type) {
            Html::addCssClass($this->options, ['type' => 'breadcrumb-' . $this->type]);
        }
        if ($this->muted) {
            Html::addCssClass($this->options, ['muted' => 'breadcrumb-muted']);
        }
    }

    protected function renderItem($link, $isActive = false)
    {
        $label = ArrayHelper::getValue($link, 'label', '');
        if (ArrayHelper::getValue($link, 'encode', true)) {
            $label = Html::encode($label);
        }

        $icon = ArrayHelper::getValue($link, 'icon');
        if ($icon) {
            $label = \bestyii\tabler\Icon::widget(['name' => $icon]) . ($label ? ' ' . $label : '');
        }

        $options = ArrayHelper::getValue($link, 'options', []);
        Html::addCssClass($options, 'breadcrumb-item');

        if ($isActive) {
            Html::addCssClass($options, 'active');
            $options['aria-current'] = 'page';
            return Html::tag('li', $label, $options);
        }

        return Html::tag('li', Html::a($label, ArrayHelper::getValue($link, 'url', '#')), $options);
    }
}
