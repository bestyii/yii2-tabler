---
title: Offcanvas
description: Slide-over panel container for filters, menus and secondary workflows.
related: [Button]
---

# Offcanvas

`bestyii\tabler\Offcanvas` renders a Tabler offcanvas container with header and body slots.

## Demo

```php-demo
use bestyii\tabler\Offcanvas;

echo Offcanvas::widget([
    'title' => 'Filters',
    'body' => '<p class="mb-0">Put filter controls here.</p>',
    'placement' => 'start',
]);
```
