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
    'contentHtml' => '<strong class="fs-2">$12,480</strong>',
    'footerHtml' => '<span class="text-secondary">Updated 2 minutes ago</span>',
    'statusColor' => 'green',
]);
```

## Content Contract

- `title` and `subtitle` are treated as text and escaped.
- `contentHtml`, `headerHtml` and `footerHtml` are the explicit raw HTML slots for new code.
- Legacy `content`, `header` and `footer` remain supported for compatibility with older views.
