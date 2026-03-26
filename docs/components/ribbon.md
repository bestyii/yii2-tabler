---
title: Ribbon
description: Highlight card-like content with a positioned Tabler ribbon marker.
related: [Card, Badge]
status: hybrid-ready
preview: /preview-lab/cards
mirror: /preview/cards
source: src/Ribbon.php
test: tests/RibbonTest.php
package: bestyii/yii2-tabler
---

# Ribbon

`bestyii\tabler\Ribbon` renders a positioned ribbon marker that can contain text, an icon, or both.

## Shortcut Methods

```php-demo
use bestyii\tabler\Ribbon;

echo '<div class="card position-relative"><div class="card-body" style="height: 6rem"></div>'
    . Ribbon::green('NEW', placement: 'top-end', bookmark: true)
    . '</div>';
```

## Available Presets

`Ribbon` currently provides these preset helpers:

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
use bestyii\tabler\Ribbon;

echo '<div class="card position-relative"><div class="card-body" style="height: 6rem"></div>'
    . Ribbon::make(
        color: 'orange',
        text: 'BETA',
        placement: 'bottom-start',
        icon: 'bolt',
    )
    . '</div>';
```

## Full `widget()` API

```php-demo
use bestyii\tabler\Ribbon;

echo '<div class="card position-relative"><div class="card-body" style="height: 6rem"></div>'
    . Ribbon::widget([
        'text' => 'NEW',
        'color' => 'green',
        'placement' => 'top-end',
        'bookmark' => true,
    ])
    . '</div>';
```

## Usage Notes

- Shortcut methods are best when the ribbon color is fixed.
- `make()` gives you named arguments for dynamic color or placement selection.
- `widget([...])` remains useful when ribbon config is already built as an array.
