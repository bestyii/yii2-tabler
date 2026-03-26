---
title: Popover
description: Bootstrap popover trigger rendered through Tabler assets and button styles.
related: [Button, Modal]
status: hybrid-ready
preview: /preview-lab/modals
mirror: /preview/modals
source: src/Popover.php
test: tests/PopoverTest.php
package: bestyii/yii2-tabler
---

# Popover

`bestyii\tabler\Popover` registers Bootstrap popover behaviour on top of the Tabler asset stack.

## Shortcut Methods

```php-demo
use bestyii\tabler\Popover;

echo Popover::top(
    content: '<strong>Popover body</strong>',
    title: 'Quick details',
    trigger: Popover::TRIGGER_HOVER,
    toggleButton: [
        'label' => 'Inspect',
    ],
);
```

Placement helper methods cover `auto()`, `top()`, `bottom()`, `left()` and `right()`.

## Available Presets

`Popover` currently provides these preset helpers:

- `auto()`
- `top()`
- `bottom()`
- `left()`
- `right()`

## Typed `make()` API

```php-demo
use bestyii\tabler\Popover;

echo Popover::make(
    placement: Popover::PLACEMENT_RIGHT,
    title: 'Quick details',
    content: '<strong>Popover body</strong>',
    trigger: Popover::TRIGGER_FOCUS,
    toggleButton: [
        'label' => 'Inspect',
        'tag' => 'a',
        'href' => '#details',
    ],
    clientOptions: [
        'customClass' => 'popover-wide',
    ],
);
```

Use `make()` when the placement or trigger is dynamic and you still want a typed API instead of a config array.

## Full `widget()` API

```php-demo
use bestyii\tabler\Popover;

echo Popover::widget([
    'title' => 'Quick details',
    'content' => '<strong>Popover body</strong>',
    'placement' => Popover::PLACEMENT_TOP,
    'trigger' => Popover::TRIGGER_CLICK,
    'toggleButton' => [
        'label' => 'Inspect',
    ],
    'clientOptions' => [
        'customClass' => 'popover-wide',
    ],
]);
```

## Usage Notes

- Use the placement shortcuts when the popover position is fixed in the template.
- `trigger` supports `click`, `hover`, `focus` and `manual` through the class constants.
- Set `toggleButton` to `false` when you only want to register popover behaviour for an existing element with a known ID.
- `make()` is useful when placement or trigger comes from runtime conditions.
- `widget([...])` and `begin()/end()` remain the better fit when the content markup is buffered separately.
