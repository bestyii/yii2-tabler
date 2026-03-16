<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

class Carousel extends Widget
{
    /**
     * @var array list of slides in the carousel. Each array element represents a single slide.
     * Each slide can be an array with 'content' and optional 'caption', 'options'.
     */
    public $items = [];

    /**
     * @var bool whether carousel indicators (bullets) should be displayed.
     */
    public $showIndicators = true;

    /**
     * @var bool whether carousel controls (previous/next buttons) should be displayed.
     */
    public $showControls = true;

    /**
     * @var bool whether the carousel slides should crossfade instead of sliding.
     */
    public $crossfade = false;

    /**
     * @var array the HTML attributes for the container tag.
     */
    public $options = ['class' => 'carousel slide', 'data-bs-ride' => 'carousel'];

    /**
     * @var array the HTML attributes for the inner container tag.
     */
    public $innerOptions = ['class' => 'carousel-inner'];

    /**
     * @var array HTML attributes for the indicators container
     */
    public $indicatorOptions = ['class' => 'carousel-indicators'];

    public function init(): void
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if ($this->crossfade) {
            Html::addCssClass($this->options, 'carousel-fade');
        }
    }

    public function run()
    {
        $content = '';
        if ($this->showIndicators) {
            $content .= $this->renderIndicators();
        }

        $content .= $this->renderItems();

        if ($this->showControls) {
            $content .= $this->renderControls();
        }

        return Html::tag('div', $content, $this->options);
    }

    public function renderIndicators()
    {
        $indicators = [];
        for ($i = 0, $count = count($this->items); $i < $count; $i++) {
            $item = $this->items[$i];
            $options = [
                'type' => 'button',
                'data-bs-target' => '#' . $this->options['id'],
                'data-bs-slide-to' => $i,
                'aria-label' => 'Slide ' . ($i + 1),
            ];

            if (is_array($item) && isset($item['indicatorOptions'])) {
                $options = ArrayHelper::merge($options, $item['indicatorOptions']);
            }

            if ($i === 0) {
                Html::addCssClass($options, 'active');
                $options['aria-current'] = 'true';
            }
            $indicators[] = Html::tag('button', '', $options);
        }

        return Html::tag('div', implode("\n", $indicators), $this->indicatorOptions);
    }

    public function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            $items[] = $this->renderItem($item, $i);
        }
        return Html::tag('div', implode("\n", $items), $this->innerOptions);
    }

    public function renderItem($item, $index)
    {
        if (is_string($item)) {
            $content = $item;
            $caption = null;
            $options = [];
        } elseif (isset($item['content'])) {
            $content = $item['content'];
            $caption = ArrayHelper::getValue($item, 'caption');
            $captionBackground = '';
            if ($caption !== null) {
                $captionBackground = Html::tag('div', '', ['class' => 'carousel-caption-background d-none d-md-block']);
                $caption = Html::tag('div', $caption, ['class' => 'carousel-caption d-none d-md-block']);
            }
            $options = ArrayHelper::getValue($item, 'options', []);
            $content = $content . "\n" . $captionBackground;
        } else {
            return '';
        }

        Html::addCssClass($options, ['widget' => 'carousel-item']);
        if ($index === 0) {
            Html::addCssClass($options, 'active');
        }

        return Html::tag('div', $content . "\n" . $caption, $options);
    }

    public function renderControls()
    {
        $id = $this->options['id'];

        $prevIcon = Html::tag('span', '', ['class' => 'carousel-control-prev-icon', 'aria-hidden' => 'true']);
        $prevText = Html::tag('span', 'Previous', ['class' => 'visually-hidden']);
        $prev = Html::a($prevIcon . "\n" . $prevText, '#' . $id, [
            'class' => 'carousel-control-prev',
            'data-bs-target' => '#' . $id,
            'data-bs-slide' => 'prev',
            'role' => 'button'
        ]);

        $nextIcon = Html::tag('span', '', ['class' => 'carousel-control-next-icon', 'aria-hidden' => 'true']);
        $nextText = Html::tag('span', 'Next', ['class' => 'visually-hidden']);
        $next = Html::a($nextIcon . "\n" . $nextText, '#' . $id, [
            'class' => 'carousel-control-next',
            'data-bs-target' => '#' . $id,
            'data-bs-slide' => 'next',
            'role' => 'button'
        ]);

        return $prev . "\n" . $next;
    }
}
