---
title: ButtonDropdown
description: Split or single-button dropdown trigger rendered in Tabler button styles.
related: [Button, DropdownMenu]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/ButtonDropdown.php
test: tests/ButtonDropdownTest.php
package: bestyii/yii2-tabler
---

# ButtonDropdown

`bestyii\tabler\ButtonDropdown` combines a primary action button with a Tabler dropdown menu.

## Shortcut Methods

```php-demo
use bestyii\tabler\ButtonDropdown;

echo ButtonDropdown::secondary(
    'Actions',
    dropdown: [
        'items' => [
            ['label' => 'Edit', 'url' => '#'],
            ['label' => 'Archive', 'url' => '#'],
        ],
    ],
    direction: ButtonDropdown::DIRECTION_UP,
);
```

Color helper methods mirror `Button`, so common presets like `primary()`, `secondary()`, `success()` or `green()` are available directly.

## Available Presets

`ButtonDropdown` currently provides these preset helpers:

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
use bestyii\tabler\ButtonDropdown;

echo ButtonDropdown::make(
    color: 'warning',
    label: 'Queue actions',
    dropdown: [
        'items' => [
            ['label' => 'Retry', 'url' => '#'],
            ['label' => 'Pause', 'url' => '#'],
        ],
    ],
    icon: 'settings',
    split: true,
    buttonOptions: ['href' => ['/queue/index']],
    size: 'sm',
);
```

Use `make()` when the color, direction or dropdown items are assembled dynamically in PHP first.

## Full `widget()` API

```php-demo
use bestyii\tabler\ButtonDropdown;

echo ButtonDropdown::widget([
    'label' => 'Actions',
    'color' => 'secondary',
    'icon' => 'settings',
    'direction' => ButtonDropdown::DIRECTION_RIGHT,
    'split' => true,
    'buttonOptions' => [
        'href' => ['/settings/index'],
    ],
    'dropdown' => [
        'items' => [
            ['label' => 'Edit', 'url' => '#'],
            ['label' => 'Archive', 'url' => '#'],
        ],
    ],
]);
```

## Usage Notes

- Use color shortcut methods when the button style is fixed in the view.
- `direction` supports `down`, `left`, `right` and `up` through the class constants.
- Set `split: true` when the main button should remain a separate action from the dropdown toggle.
- Put `href` into `buttonOptions` when the action side should render as a link.
- Keep `widget([...])` when the menu config already exists as an array or is reused across views.
