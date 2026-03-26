---
title: Offcanvas
description: Slide-over panel container for filters, menus and secondary workflows.
related: [Button]
status: hybrid-ready
preview: /preview-lab/settings
mirror: /preview/offcanvas
source: src/Offcanvas.php
test: tests/OffcanvasTest.php
package: bestyii/yii2-tabler
---

# Offcanvas

`bestyii\tabler\Offcanvas` renders a Tabler offcanvas container with header and body slots.

## Shortcut Methods

```php-demo
use bestyii\tabler\Offcanvas;

echo Offcanvas::left(
    title: 'Filters',
    body: '<p class="mb-0">Put filter controls here.</p>',
);
```

Placement helper methods cover the built-in positions, so `left()`, `right()`, `top()` and `bottom()` are available directly.

## Available Presets

`Offcanvas` currently provides these preset helpers:

- `left()`
- `right()`
- `top()`
- `bottom()`

## Typed `make()` API

```php-demo
use bestyii\tabler\Offcanvas;

echo Offcanvas::make(
    placement: Offcanvas::PLACEMENT_BOTTOM,
    title: 'Release notes',
    body: '<p class="mb-0">Queued changes will be deployed after approval.</p>',
    blur: false,
    options: ['class' => 'shadow-sm'],
);
```

Use `make()` when the placement is dynamic or chosen in application logic before rendering.

## Full `widget()` API

```php-demo
use bestyii\tabler\Offcanvas;

echo Offcanvas::widget([
    'title' => 'Filters',
    'body' => '<p class="mb-0">Put filter controls here.</p>',
    'placement' => Offcanvas::PLACEMENT_START,
    'blur' => true,
    'options' => [
        'id' => 'filters-panel',
    ],
]);
```

## Usage Notes

- Use the placement shortcuts when the panel position is fixed in the view.
- `left()` maps to Bootstrap's `start` placement, and `right()` maps to `end`, so the inherited `begin()/end()` lifecycle stays available.
- `make()` is the typed middle ground when placement or blur is decided in PHP first.
- `widget([...])` and `begin()/end()` are still useful when the body markup is assembled separately.
- `blur` controls whether the offcanvas gets the Tabler blur treatment and backdrop attribute.
