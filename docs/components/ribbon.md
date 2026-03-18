---
title: Ribbon
description: Highlight card-like content with a positioned Tabler ribbon marker.
related: [Card, Badge]
status: hybrid-ready
preview: /preview-lab/cards
mirror: /preview/cards
source: src/Ribbon.php
test: tests/RibbonTest.php
package: bestyii/yii2-tabler
---

# Ribbon

`bestyii\tabler\Ribbon` renders a positioned ribbon marker that can contain text, an icon, or both.

## Demo

```php-demo
use bestyii\tabler\Ribbon;

echo '<div class="card position-relative"><div class="card-body" style="height: 6rem"></div>'
    . Ribbon::widget([
        'text' => 'NEW',
        'color' => 'green',
        'placement' => 'top-end',
        'bookmark' => true,
    ])
    . '</div>';
```
