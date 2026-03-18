---
title: Spinner
description: Loading-state indicator for background work and pending UI actions.
related: [Button]
status: hybrid-ready
preview: /preview-lab/dashboard
mirror: /preview/dashboard-crypto
source: src/Spinner.php
test: tests/SpinnerTest.php
package: bestyii/yii2-tabler
---

# Spinner

`bestyii\tabler\Spinner` wraps Bootstrap 5 spinner markup with Tabler color classes.

## Demo

```php-demo
use bestyii\tabler\Spinner;

echo Spinner::widget([
    'color' => 'blue',
    'size' => 'sm',
    'label' => 'Loading release metrics',
]);
```
