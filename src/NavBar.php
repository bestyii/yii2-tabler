<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\TablerAsset;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class NavBar extends Widget
{
    public array $options = [];
    public array|bool $collapseOptions = [];
    public array|bool $offcanvasOptions = false;
    public string|bool $brandLabel = false;
    public string|bool $brandImage = false;
    public array $brandImageOptions = [];
    public array|string|bool|null $brandUrl = false;
    public array $brandOptions = [];
    public ?string $screenReaderToggleText = null;
    public string $togglerContent = '<span class="navbar-toggler-icon"></span>';
    public array $togglerOptions = [];
    public bool $renderInnerContainer = true;
    public array $innerContainerOptions = [];
    private string $navTag = 'nav';
    private string $collapseTag = 'div';

    public function init(): void
    {
        parent::init();
        TablerAsset::register($this->getView());

        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, ['navbar', 'navbar-expand-lg']);
        if (!$this->hasBackgroundClass($this->options)) {
            Html::addCssClass($this->options, ['navbar-light', 'bg-body']);
        }

        if ($this->renderInnerContainer) {
            Html::addCssClass($this->innerContainerOptions, 'container-xl');
        }

        if ($this->collapseOptions !== false && !isset($this->collapseOptions['id'])) {
            $this->collapseOptions['id'] = $this->options['id'] . '-collapse';
        }

        if ($this->offcanvasOptions !== false && !isset($this->offcanvasOptions['id'])) {
            $this->offcanvasOptions['id'] = $this->options['id'] . '-offcanvas';
        }

        $this->navTag = ArrayHelper::remove($this->options, 'tag', 'nav');
        echo Html::beginTag($this->navTag, $this->options) . "\n";
        if ($this->renderInnerContainer) {
            echo Html::beginTag('div', $this->innerContainerOptions) . "\n";
        }

        echo $this->renderBrand() . "\n";
        echo $this->renderToggleButton() . "\n";

        if ($this->collapseOptions !== false) {
            Html::addCssClass($this->collapseOptions, ['collapse', 'navbar-collapse']);
            $this->collapseTag = ArrayHelper::remove($this->collapseOptions, 'tag', 'div');
            echo Html::beginTag($this->collapseTag, $this->collapseOptions) . "\n";
        } elseif ($this->offcanvasOptions !== false) {
            Offcanvas::begin($this->offcanvasOptions);
        }
    }

    public function run(): string
    {
        $html = '';

        if ($this->collapseOptions !== false) {
            $html .= Html::endTag($this->collapseTag) . "\n";
        } elseif ($this->offcanvasOptions !== false) {
            Offcanvas::end();
        }

        if ($this->renderInnerContainer) {
            $html .= Html::endTag('div') . "\n";
        }

        return $html . Html::endTag($this->navTag);
    }

    protected function renderBrand(): string
    {
        if ($this->brandImage !== false) {
            $this->brandLabel = Html::img((string) $this->brandImage, $this->brandImageOptions);
        }

        if ($this->brandLabel === false) {
            return '';
        }

        Html::addCssClass($this->brandOptions, 'navbar-brand');
        if ($this->brandUrl === null) {
            return Html::tag('span', (string) $this->brandLabel, $this->brandOptions);
        }

        $url = $this->brandUrl === false ? Yii::$app->homeUrl : Url::to($this->brandUrl);

        return Html::a((string) $this->brandLabel, $url, $this->brandOptions);
    }

    protected function renderToggleButton(): string
    {
        if ($this->collapseOptions === false && $this->offcanvasOptions === false) {
            return '';
        }

        $options = $this->togglerOptions;
        Html::addCssClass($options, 'navbar-toggler');
        $options['type'] ??= 'button';

        if ($this->offcanvasOptions !== false) {
            $target = '#' . $this->offcanvasOptions['id'];
            $options['data-bs-toggle'] = 'offcanvas';
        } else {
            $target = '#' . $this->collapseOptions['id'];
            $options['data-bs-toggle'] = 'collapse';
        }

        $options['data-bs-target'] = $target;
        $options['aria-controls'] = ltrim($target, '#');
        $options['aria-expanded'] = 'false';
        $options['aria-label'] ??= $this->screenReaderToggleText ?? 'Toggle navigation';

        return Html::button($this->togglerContent, $options);
    }

    private function hasBackgroundClass(array $options): bool
    {
        $classes = (array) ($options['class'] ?? []);
        $classList = implode(' ', $classes);

        return str_contains($classList, 'bg-') || str_contains($classList, 'navbar-dark') || str_contains($classList, 'navbar-light');
    }
}
