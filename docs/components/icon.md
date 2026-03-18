---
title: Icon
description: Tabler Icons wrapper that registers the icon asset and renders a single icon tag.
related: [Badge, Button]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/navigation
source: src/Icon.php
test: tests/IconTest.php
package: bestyii/yii2-tabler
---

# Icon

`bestyii\tabler\Icon` renders a Tabler icon and makes sure the icon asset is available on the page.

## Demo

```php-demo
use bestyii\tabler\Icon;

echo Icon::widget([
    'name' => 'sparkles',
    'tag' => 'span',
]);
```
