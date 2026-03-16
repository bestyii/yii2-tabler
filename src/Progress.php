<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Progress extends Widget
{
    /**
     * @var float the percentage of the progress (0-100)
     */
    public $percent = 0;

    /**
     * @var string label to display inside the progress bar or aside
     */
    public $label;

    /**
     * @var string the color of the progress bar (e.g. 'primary', 'success', 'danger')
     */
    public $color = 'primary';

    /**
     * @var string size of the progress bar ('sm', 'xs', 'md', 'lg')
     */
    public $size;

    /**
     * @var bool whether the bar is separated (adds padding between multiple bars)
     */
    public $separated = false;

    /**
     * @var bool whether the bar is striped
     */
    public $striped = false;

    /**
     * @var bool whether the striped bar is animated
     */
    public $animated = false;

    /**
     * @var bool whether the bar is indeterminate (loading)
     */
    public $indeterminate = false;

    /**
     * @var float same as percent
     */
    public $value;

    /**
     * @var array HTML attributes for the progress bar tag
     */
    public $barOptions = [];

    /**
     * @var array multiple progress bars. Each element should be an array with keys:
     * 'percent', 'label', 'color', 'striped', 'animated', 'indeterminate', 'options'
     */
    public $bars = [];

    public function init(): void
    {
        parent::init();
        $this->initOptions();
    }

    public function run()
    {
        $barsHtml = [];
        if (!empty($this->bars)) {
            foreach ($this->bars as $barConfig) {
                $barsHtml[] = $this->renderBar($barConfig);
            }
            Html::addCssClass($this->options, 'progress-stacked');
        } else {
            $barsHtml[] = $this->renderBar([
                'percent' => $this->percent,
                'label' => $this->label,
                'color' => $this->color,
                'striped' => $this->striped,
                'animated' => $this->animated,
                'indeterminate' => $this->indeterminate,
                'options' => $this->barOptions,
            ]);
        }

        return Html::tag('div', implode("\n", $barsHtml), $this->options);
    }

    protected function initOptions(): void
    {
        if ($this->value !== null) {
            $this->percent = $this->value;
        }

        Html::addCssClass($this->options, ['widget' => 'progress']);

        if ($this->size) {
            Html::addCssClass($this->options, ['size' => 'progress-' . $this->size]);
        }

        if ($this->separated) {
            Html::addCssClass($this->options, ['separated' => 'progress-separated']);
        }
    }

    /**
     * Renders a single progress bar
     * @param array $config
     * @return string
     */
    protected function renderBar($config)
    {
        $percent = ArrayHelper::getValue($config, 'percent', 0);
        $label = ArrayHelper::getValue($config, 'label');
        $color = ArrayHelper::getValue($config, 'color', 'primary');
        $striped = ArrayHelper::getValue($config, 'striped', false);
        $animated = ArrayHelper::getValue($config, 'animated', false);
        $indeterminate = ArrayHelper::getValue($config, 'indeterminate', false);
        $options = ArrayHelper::getValue($config, 'options', []);

        Html::addCssClass($options, ['widget' => 'progress-bar']);
        if ($striped) {
            Html::addCssClass($options, ['striped' => 'progress-bar-striped']);
        }
        if ($animated) {
            Html::addCssClass($options, ['animated' => 'progress-bar-animated']);
        }

        if ($color) {
            Html::addCssClass($options, ['color' => 'bg-' . $color]);
        }

        if ($indeterminate) {
            Html::addCssClass($options, ['indeterminate' => 'progress-bar-indeterminate']);
        } else {
            $options['style'] = "width: {$percent}%";
        }

        $options['role'] = 'progressbar';
        $options['aria-valuenow'] = $percent;
        $options['aria-valuemin'] = 0;
        $options['aria-valuemax'] = 100;

        $content = '';
        if ($label) {
            $content = Html::tag('span', Html::encode($label), ['class' => 'progress-bar-label']);
        }

        return Html::tag('div', $content, $options);
    }
}
