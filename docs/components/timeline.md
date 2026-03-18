---
title: Timeline
description: Vertical activity timeline for delivery events, approvals and release notes.
related: [Card]
status: hybrid-ready
preview: /preview-lab/profile
mirror: /preview/timeline
source: src/Timeline.php
test: tests/TimelineTest.php
package: bestyii/yii2-tabler
---

# Timeline

`bestyii\tabler\Timeline` renders a sequence of events inside Tabler timeline cards.

## Demo

```php-demo
use bestyii\tabler\Timeline;

echo Timeline::widget([
    'items' => [
        ['time' => '10 min ago', 'title' => 'Preview smoke passed', 'description' => 'Docs and preview routes stayed green.', 'icon' => 'check', 'iconColor' => 'green'],
        ['time' => '1 hr ago', 'title' => 'Widgets updated', 'description' => 'The local wrapper set grew without opening a new lane.', 'icon' => 'box'],
    ],
]);
```
