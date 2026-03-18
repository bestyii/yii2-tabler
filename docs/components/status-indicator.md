---
title: StatusIndicator
description: Multi-circle animated indicator for live streams, background jobs and activity pulses.
related: [Status, StatusDot]
status: hybrid-ready
preview: /preview-lab/uptime
mirror: /preview/uptime
source: src/StatusIndicator.php
test: tests/StatusIndicatorTest.php
package: bestyii/yii2-tabler
---

# StatusIndicator

`bestyii\tabler\StatusIndicator` renders the three-dot activity indicator used in Tabler status panels.

## Demo

```php-demo
use bestyii\tabler\StatusIndicator;

echo StatusIndicator::widget([
    'color' => 'orange',
    'animated' => true,
]);
```
