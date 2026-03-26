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

## Shortcut Methods

```php-demo
use bestyii\tabler\StatusDot;

echo StatusDot::green(animated: true);
```

## Available Presets

`StatusDot` currently provides these preset helpers:

- `primary()`
- `secondary()`
- `success()`
- `info()`
- `warning()`
- `danger()`
- `blue()`
- `azure()`
- `indigo()`
- `purple()`
- `pink()`
- `red()`
- `orange()`
- `yellow()`
- `lime()`
- `green()`
- `teal()`
- `cyan()`
- `dark()`

## Typed `make()` API

```php-demo
use bestyii\tabler\StatusDot;

echo StatusDot::make(
    color: 'orange',
    animated: true,
);
```

## Full `widget()` API

```php-demo
use bestyii\tabler\StatusDot;

echo StatusDot::widget([
    'color' => 'green',
    'animated' => true,
    'options' => [
        'class' => 'me-1',
    ],
]);
```

## Usage Notes

- Shortcut methods are ideal when the dot color is fixed.
- `make()` keeps the API typed while allowing dynamic color selection.
- `widget([...])` remains useful when the dot config is already array-shaped.
