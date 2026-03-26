---
title: Tag
description: Flexible pill-style tag with icon and remove affordance.
related: [Badge, Icon]
status: hybrid-ready
preview: /preview-lab/tables
mirror: /preview/tags
source: src/Tag.php
test: tests/TagTest.php
package: bestyii/yii2-tabler
---

# Tag

`bestyii\tabler\Tag` renders a Tabler-style token for filters, categories and shortcuts.

## Shortcut Methods

```php-demo
use bestyii\tabler\Tag;

echo Tag::azure(
    'Dense layout',
    icon: 'layout-grid',
    removable: true,
);
```

Like `Badge`, `Tag` exposes color helpers for the built-in Tabler variants.

## Available Presets

`Tag` currently provides these preset helpers:

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
use bestyii\tabler\Tag;

echo Tag::make(
    color: 'green',
    label: 'Stable lane',
    icon: 'check',
    url: ['/preview/tables'],
);
```

Use `make()` when the color, icon or URL is prepared in PHP before rendering.

## Full `widget()` API

```php-demo
use bestyii\tabler\Tag;

echo Tag::widget([
    'label' => 'Dense layout',
    'icon' => 'layout-grid',
    'color' => 'azure',
    'removable' => true,
    'options' => [
        'class' => 'me-1',
    ],
]);
```

## Usage Notes

- Shortcut methods are best when the tag color is fixed in the template.
- `make()` gives you named arguments without dropping back to array config.
- `url` accepts a string or a Yii route array.
- Use `widget([...])` when the tag config is already composed as an array.
