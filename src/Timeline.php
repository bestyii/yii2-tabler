<?php

namespace bestyii\tabler;

use bestyii\tabler\Widget;

use yii\helpers\Html;

use yii\helpers\ArrayHelper;

class Timeline extends Widget
{
    /**
     * @var array list of timeline items.
     * Each item is an array:
     * - 'title' => string
     * - 'content' => string
     * - 'time' => string
     * - 'icon' => string (Tabler icon name)
     * - 'color' => string (e.g., 'primary', 'success')
     * - 'image' => string (URL for avatar instead of icon/color)
     * - 'options' => array (HTML options)
     */
    public $items = [];

    /**
     * @var bool whether it's a simple timeline class (`list list-timeline`)
     */
    public $simple = true;

    /**
     * @var array HTML attributes for the timeline container
     */
    public $options = [];

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        if (empty($this->items)) {
            return '';
        }

        $content = '';
        foreach ($this->items as $item) {
            $content .= $this->renderItem($item);
        }

        return Html::tag('ul', $content, $this->options);
    }

    protected function initOptions(): void
    {
        if ($this->simple) {
            Html::addCssClass($this->options, ['widget' => 'list list-timeline']);
        } else {
            Html::addCssClass($this->options, ['widget' => 'timeline']);
        }
    }

    protected function renderItem($item)
    {
        $options = ArrayHelper::getValue($item, 'options', []);

        $iconHtml = '';
        $iconClass = $this->simple ? 'list-timeline-icon' : 'timeline-event-icon';

        if (isset($item['image'])) {
            $iconOptions = ['class' => $iconClass . ' avatar avatar-sm'];
            $iconOptions['style'] = "background-image: url({$item['image']})";
            $iconHtml = Html::tag('div', '', $iconOptions);
        } elseif (isset($item['icon'])) {
            $iconOptions = ['class' => $iconClass];
            if (isset($item['color'])) {
                Html::addCssClass($iconOptions, 'bg-' . $item['color']);
            }
            $iconHtml = Html::tag('div', \bestyii\tabler\Icon::widget(['name' => $item['icon']]), $iconOptions);
        } else {
            $iconOptions = ['class' => $iconClass];
            if (isset($item['color'])) {
                Html::addCssClass($iconOptions, 'bg-' . $item['color']);
            }
            $iconHtml = Html::tag('div', '', $iconOptions); // just a dot
        }

        if ($this->simple) {
            $contentOptions = ['class' => 'list-timeline-content'];
            $body = '';

            if (isset($item['time'])) {
                $body .= Html::tag('div', $item['time'], ['class' => 'list-timeline-time']);
            }

            if (isset($item['title'])) {
                $body .= Html::tag('p', $item['title'], ['class' => 'list-timeline-title']);
            }

            if (isset($item['content'])) {
                $body .= Html::tag('p', $item['content'], ['class' => 'text-muted']);
            }

            $contentHtml = Html::tag('div', $body, $contentOptions);
            return Html::tag('li', $iconHtml . "\n" . $contentHtml, $options);
        } else {
            // Complex timeline event
            Html::addCssClass($options, 'timeline-event');
            $body = '';

            if (isset($item['card']) && $item['card']) {
                $cardOptions = ArrayHelper::getValue($item, 'cardOptions', []);
                Html::addCssClass($cardOptions, 'timeline-event-card');

                $cardBody = '';
                if (isset($item['time'])) {
                    $cardBody .= Html::tag('div', $item['time'], ['class' => 'text-secondary float-end']);
                }
                if (isset($item['title'])) {
                    $cardBody .= Html::tag('h4', $item['title']);
                }
                if (isset($item['content'])) {
                    $cardBody .= Html::tag('p', $item['content'], ['class' => 'text-secondary']);
                }

                $body = Html::tag('div', Html::tag('div', $cardBody, ['class' => 'card-body']), $cardOptions);
            } else {
                // Custom content
                $body = ArrayHelper::getValue($item, 'content', '');
            }

            return Html::tag('li', $iconHtml . "\n" . $body, $options);
        }
    }
}
