<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\FullcalendarAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Fullcalendar extends Widget
{
    public array $calendarOptions = [];
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();

        $this->registerPlugin();

        return Html::tag('div', '', $this->options);
    }

    private function registerPlugin(): void
    {
        FullcalendarAsset::register($this->getView());

        $id = Json::htmlEncode($this->options['id']);
        $configJson = Json::htmlEncode($this->calendarOptions);
        $js = <<<JS
(() => {
  const element = document.getElementById($id);
  if (!element || !window.FullCalendar || element.dataset.tablerCalendarInit === '1') {
    return;
  }
  const calendar = new FullCalendar.Calendar(element, $configJson);
  calendar.render();
  element.dataset.tablerCalendarInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }
}
