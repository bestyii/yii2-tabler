---
title: Fullcalendar
description: FullCalendar wrapper for schedule-heavy release and operations views.
related: [Card]
status: hybrid-ready
preview: /preview-lab/plugins
mirror: /preview/fullcalendar
source: src/Fullcalendar.php
test: tests/FullcalendarTest.php
package: bestyii/yii2-tabler
---

# Fullcalendar

`bestyii\tabler\Fullcalendar` renders a calendar container and initializes FullCalendar with supplied options.

## Demo

```php-demo
use bestyii\tabler\Fullcalendar;

echo Fullcalendar::widget([
    'calendarOptions' => [
        'initialView' => 'dayGridMonth',
        'events' => [
            ['title' => 'Release cut', 'start' => '2026-03-18'],
        ],
    ],
    'options' => ['style' => 'min-height: 320px'],
]);
```
