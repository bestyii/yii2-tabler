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

## Shortcut Methods

```php-demo
use bestyii\tabler\Status;

echo Status::green('Ready');
```

## Available Presets

`Status` currently provides these preset helpers:

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
use bestyii\tabler\Status;

echo Status::make(
    color: 'orange',
    text: 'Queued',
    showDot: false,
);
```

## Full `widget()` API

```php-demo
use bestyii\tabler\Status;

echo Status::widget([
    'text' => 'Ready',
    'color' => 'green',
    'showDot' => true,
    'options' => [
        'class' => 'me-2',
    ],
]);
```

## Usage Notes

- Shortcut methods are best when the status color is fixed in the template.
- `make()` is the typed middle ground when the color is calculated in PHP first.
- `widget([...])` remains the low-level API for array-based configuration or reusable config blocks.
