---
title: Card
description: Surface container for stats, forms and preview blocks.
related: [Button, Badge]
status: hybrid-ready
preview: /preview-lab/cards
mirror: /preview/cards
source: src/Card.php
test: tests/CardTest.php
package: bestyii/yii2-tabler
---

# Card

`bestyii\tabler\Card` provides a minimal Tabler card shell with header, body, footer and status support.

## Demo

```php-demo
use bestyii\tabler\Card;

echo Card::widget([
    'title' => 'Revenue',
    'subtitle' => 'Current month',
    'content' => '<strong class="fs-2">$12,480</strong>',
    'footer' => 'Updated 2 minutes ago',
    'statusColor' => 'green',
]);
```
