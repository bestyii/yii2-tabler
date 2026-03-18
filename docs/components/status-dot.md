---
title: StatusDot
description: Tiny pulse helper for compact uptime and health indicators.
related: [Status, StatusIndicator]
status: hybrid-ready
preview: /preview-lab/dashboard
mirror: /preview/dashboard-crypto
source: src/StatusDot.php
test: tests/StatusDotTest.php
package: bestyii/yii2-tabler
---

# StatusDot

`bestyii\tabler\StatusDot` renders the minimal Tabler status pulse without extra label markup.

## Demo

```php-demo
use bestyii\tabler\StatusDot;

echo StatusDot::widget([
    'color' => 'green',
    'animated' => true,
]);
```
