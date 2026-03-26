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

## Shortcut Methods

```php-demo
use bestyii\tabler\StatusIndicator;

echo StatusIndicator::orange(animated: true);
```

## Available Presets

`StatusIndicator` currently provides these preset helpers:

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
use bestyii\tabler\StatusIndicator;

echo StatusIndicator::make(
    color: 'green',
    animated: true,
);
```

## Full `widget()` API

```php-demo
use bestyii\tabler\StatusIndicator;

echo StatusIndicator::widget([
    'color' => 'orange',
    'animated' => true,
    'options' => [
        'class' => 'me-2',
    ],
]);
```

## Usage Notes

- Shortcut methods are the fastest path when the indicator color is fixed.
- `make()` fits better when the color is chosen dynamically by application state.
- `widget([...])` still works best for reusable array configs.
