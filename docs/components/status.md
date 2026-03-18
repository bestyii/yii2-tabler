---
title: Status
description: Compact colored status indicator with optional text label.
related: [Badge]
status: hybrid-ready
preview: /preview-lab/tables
mirror: /preview/tables
source: src/Status.php
test: tests/StatusTest.php
package: bestyii/yii2-tabler
---

# Status

`bestyii\tabler\Status` renders a small Tabler status marker with text.

## Demo

```php-demo
use bestyii\tabler\Status;

echo Status::widget([
    'text' => 'Ready',
    'color' => 'green',
]);
```
