---
title: Tracking
description: Compact operational status grid for health, uptime and rollout coverage blocks.
related: [Status]
status: hybrid-ready
preview: /preview-lab/dashboard
mirror: /preview/tracking
source: src/Tracking.php
test: tests/TrackingTest.php
package: bestyii/yii2-tabler
---

# Tracking

`bestyii\tabler\Tracking` renders Tabler tracking blocks for simple operational heatmaps.

## Demo

```php-demo
use bestyii\tabler\Tracking;

echo Tracking::widget([
    'blocks' => [
        ['status' => 'success', 'title' => 'Operational'],
        ['status' => 'warning', 'title' => 'High load'],
        ['status' => 'danger', 'title' => 'Downtime'],
        ['title' => 'No data'],
    ],
]);
```
