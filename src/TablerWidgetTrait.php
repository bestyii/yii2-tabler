<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\TablerAsset;
use yii\helpers\Json;

/**
 * TablerWidgetTrait provides common methods and properties for all Tabler widgets.
 */
trait TablerWidgetTrait
{
    /**
     * @var array|false the options for the underlying JS plugin.
     * If false, no JS will be registered.
     */
    public $clientOptions = [];

    /**
     * @var array the event handlers for the underlying JS plugin.
     */
    public $clientEvents = [];

    /**
     * Initializes the widget.
     */
    public function init(): void
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Registers Tabler assets and the optional JS plugin.
     * @param string|null $pluginName the name of the JS plugin to initialize. 
     * If null, only assets are registered.
     */
    protected function registerPlugin(?string $pluginName = null): void
    {
        $view = $this->getView();
        TablerAsset::register($view);

        if ($pluginName !== null && $this->clientOptions !== false) {
            $id = $this->options['id'];
            $options = empty($this->clientOptions) ? '{}' : Json::htmlEncode($this->clientOptions);
            $js = "(new bootstrap." . ucfirst($pluginName) . "('#$id', $options));";
            $view->registerJs($js);
        }

        $this->registerClientEvents();
    }

    /**
     * Registers JS event handlers.
     */
    protected function registerClientEvents(): void
    {
        if (!empty($this->clientEvents)) {
            $id = $this->options['id'];
            $js = [];
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "document.getElementById('$id').addEventListener('$event', $handler);";
            }
            $this->getView()->registerJs(implode("\n", $js));
        }
    }
}
