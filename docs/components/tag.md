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

## Demo

```php-demo
use bestyii\tabler\Tag;

echo Tag::widget([
    'label' => 'Dense layout',
    'icon' => 'layout-grid',
    'color' => 'azure',
    'removable' => true,
]);
```
