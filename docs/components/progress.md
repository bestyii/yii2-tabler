---
title: Progress
description: Progress bar widget with stacked and labeled variants.
related: [Badge]
status: hybrid-ready
preview: /preview-lab/settings
mirror: /preview/progress
source: src/Progress.php
test: tests/ProgressTest.php
package: bestyii/yii2-tabler
---

# Progress

`bestyii\tabler\Progress` renders Tabler progress bars, including striped and stacked variants.

## Shortcut Methods

```php-demo
use bestyii\tabler\Progress;

echo Progress::success(
    72,
    label: '72%',
    striped: true,
);
```

The shortcut helpers target the common single-bar case.

## Available Presets

`Progress` currently provides these preset helpers for single-bar usage:

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
use bestyii\tabler\Progress;

echo Progress::make(
    color: 'orange',
    percent: 58,
    label: '58%',
    animated: true,
    options: ['class' => 'mb-3'],
);
```

Use `make()` when the color is dynamic but the output is still a single progress bar.

## Full `widget()` API

```php-demo
use bestyii\tabler\Progress;

echo Progress::widget([
    'bars' => [
        ['percent' => 35, 'color' => 'success', 'label' => 'Done'],
        ['percent' => 25, 'color' => 'warning', 'label' => 'Review'],
        ['percent' => 40, 'color' => 'secondary', 'label' => 'Queued'],
    ],
    'options' => [
        'class' => 'mb-3',
    ],
]);
```

## Usage Notes

- Shortcut methods and `make()` only target the single-bar variant.
- Use `widget([...])` when you need stacked bars, custom `barOptions`, or array-based configuration.
- `percent` is the main entry point for the shortcut API; `value` remains available on the low-level widget config.
