---
title: Tabs
description: Bootstrap 5 / Tabler tabs widget for section switching.
related: [Nav, Card]
---

# Tabs

`bestyii\tabler\Tabs` renders Tabler tabs with pane content and active state handling.

## Demo

```php-demo
use bestyii\tabler\Tabs;

echo Tabs::widget([
    'items' => [
        ['label' => 'Overview', 'content' => '<p class="mb-0">Overview panel</p>', 'active' => true],
        ['label' => 'Activity', 'content' => '<p class="mb-0">Activity panel</p>'],
    ],
]);
```
