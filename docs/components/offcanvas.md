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

## Demo

```php-demo
use bestyii\tabler\Offcanvas;

echo Offcanvas::widget([
    'title' => 'Filters',
    'body' => '<p class="mb-0">Put filter controls here.</p>',
    'placement' => 'start',
]);
```
