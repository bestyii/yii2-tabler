---
title: Alert
description: Status messaging widget for inline feedback in docs and preview pages.
related: [Button, Icon]
status: hybrid-ready
preview: /preview-lab/alerts
mirror: /preview/alerts
source: src/Alert.php
test: tests/AlertTest.php
package: bestyii/yii2-tabler
---

# Alert

`bestyii\tabler\Alert` renders a Tabler alert with optional title, icon and dismiss button.

## Shortcut Methods

```php-demo
use bestyii\tabler\Alert;

echo Alert::success(
    'Changes were synced to the preview environment.',
    title: 'Profile saved',
    icon: 'check',
);
```

Use `Alert::success()`, `Alert::warning()`, `Alert::danger()` and the other type shortcuts for the common cases.

## Available Presets

`Alert` currently provides these preset helpers:

- `primary()`
- `secondary()`
- `success()`
- `info()`
- `warning()`
- `danger()`

## Typed `make()` API

```php-demo
use bestyii\tabler\Alert;

echo Alert::make(
    type: 'warning',
    title: 'Manual review required',
    body: 'This change touches billing logic and should be double-checked.',
    icon: 'alert-triangle',
    dismissible: false,
);
```

Use `make()` when the alert type is dynamic or chosen in application logic before rendering.

## Full `widget()` API

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'title' => 'Profile saved',
    'body' => 'Changes were synced to the preview environment.',
    'type' => 'success',
    'icon' => 'check',
    'dismissible' => true,
]);
```

## Usage Notes

- Shortcut methods are the fastest path when the alert type is known up front.
- `make()` keeps the API typed while letting you choose the type dynamically.
- `widget([...])` and `begin()/end()` still make sense when the body HTML is assembled separately or reused as config.
