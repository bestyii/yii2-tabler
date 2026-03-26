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

## Shortcut Methods

```php-demo
use bestyii\tabler\Badge;

echo Badge::green('Ready', lite: true)
    . Badge::orange('Review queue', lite: true, options: ['class' => 'ms-2']);
```

Color helper methods are available for built-in variants such as `primary()`, `secondary()`, `success()`, `danger()`, `green()`, `azure()` and more.

## Available Presets

`Badge` currently provides these preset helpers:

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
use bestyii\tabler\Badge;

echo Badge::make(
    color: 'secondary',
    text: 'Draft',
    lite: true,
    options: ['class' => 'text-uppercase'],
);
```

Use `make()` when the color is dynamic and you still want a typed API instead of a config array.

## Full `widget()` API

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget([
    'text' => 'Ready',
    'color' => 'green',
    'lite' => true,
    'options' => [
        'class' => 'ms-2',
    ],
]);
```

## Usage Notes

- Shortcut methods are best for hard-coded preset colors in views.
- `make()` is the right middle ground when color or options are assembled in PHP first.
- `widget([...])` still fits best when you are already building config arrays in loops, factory methods or config files.
