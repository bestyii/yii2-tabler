---
title: Badge
description: Lightweight status label widget used across docs and preview validation pages.
related: [Button, PageHeader]
status: hybrid-ready
preview: /preview-lab/dashboard
mirror: /preview/tables
source: src/Badge.php
test: tests/BadgeTest.php
package: bestyii/yii2-tabler
---

# Badge

`bestyii\tabler\Badge` renders a Tabler badge for status labels and counters.

## Demo

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget([
    'text' => 'Ready',
    'color' => 'green',
    'lite' => true,
]);
```
