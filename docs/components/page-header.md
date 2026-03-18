---
title: PageHeader
description: Header shell for section pretitle, main page title and action content.
related: [Button, Badge]
status: hybrid-ready
preview: /preview-lab/dashboard
mirror: /preview/index
source: src/PageHeader.php
test: tests/PageHeaderTest.php
package: bestyii/yii2-tabler
---

# PageHeader

`bestyii\tabler\PageHeader` renders the standard Tabler page heading block used across docs and preview pages.

## Demo

```php-demo
use bestyii\tabler\Badge;
use bestyii\tabler\PageHeader;

echo PageHeader::widget([
    'preTitle' => 'Reference',
    'title' => 'Hybrid Widgets',
    'content' => Badge::widget([
        'text' => 'Ready',
        'color' => 'green',
        'lite' => true,
    ]),
]);
```
