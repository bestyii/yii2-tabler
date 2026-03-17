---
title: Alert
description: Status messaging widget for inline feedback in docs and preview pages.
related: [Button, Icon]
---

# Alert

`bestyii\tabler\Alert` renders a Tabler alert with optional title, icon and dismiss button.

## Demo

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'title' => 'Profile saved',
    'body' => 'Changes were synced to the preview environment.',
    'type' => 'success',
    'icon' => 'check',
]);
```
