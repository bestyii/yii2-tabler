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

## Shortcut Methods

```php-demo
use bestyii\tabler\Spinner;

echo Spinner::grow(color: 'blue', size: 'sm', label: 'Loading release metrics');
```

## Available Presets

`Spinner` currently provides these preset helpers:

- `border()`
- `grow()`

## Typed `make()` API

```php-demo
use bestyii\tabler\Spinner;

echo Spinner::make(
    type: 'border',
    color: 'orange',
    size: 'sm',
    label: 'Loading queue',
);
```

## Full `widget()` API

```php-demo
use bestyii\tabler\Spinner;

echo Spinner::widget([
    'type' => 'border',
    'color' => 'blue',
    'size' => 'sm',
    'label' => 'Loading release metrics',
]);
```

## Usage Notes

- Use `border()` or `grow()` when the spinner type is fixed in the template.
- Use `make()` when the spinner type or color is chosen in PHP first.
- Keep `widget([...])` for low-level config arrays or reusable config blocks.
