---
title: Button
description: Minimal Button widget used by the docs shell and preview bootstrap.
related: [Badge, Icon]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/Button.php
test: tests/ButtonTest.php
package: bestyii/yii2-tabler
---

# Button

`bestyii\tabler\Button` renders a Tabler-styled button or link.

## Shortcut Methods

```php-demo
use bestyii\tabler\Button;

echo Button::primary(
    'Open Preview',
    icon: 'eye',
    url: ['/preview'],
);
```

Shortcut helpers cover the built-in color presets such as `primary()`, `secondary()`, `success()` and the Tabler palette variants like `green()` or `azure()`.

## Available Presets

`Button` currently provides these preset helpers:

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
use bestyii\tabler\Button;

echo Button::make(
    color: 'danger',
    label: 'Delete record',
    icon: 'trash',
    outline: true,
    size: 'sm',
    options: ['class' => 'w-100'],
);
```

Use `make()` when the color is dynamic, or when a helper like `Button::primary()` would be too specific for the calling code.

## Full `widget()` API

```php-demo
use bestyii\tabler\Button;

echo Button::widget([
    'label' => 'Open Preview',
    'icon' => 'eye',
    'url' => ['/preview'],
    'color' => 'primary',
    'options' => [
        'class' => 'w-100',
    ],
]);
```

## Usage Notes

- `url` accepts either a plain string or a Yii route array.
- Use shortcut methods for the common fixed-color buttons in templates.
- Use `make()` when you want a typed API with named arguments.
- Use `widget([...])` when the config is already array-shaped or shared across different call sites.
