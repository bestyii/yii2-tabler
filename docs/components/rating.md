---
title: Rating
description: Lightweight read-only rating display built from Tabler icons.
related: [Icon]
status: hybrid-ready
preview: /preview-lab/cards
mirror: /preview/cards
source: src/Rating.php
test: tests/RatingTest.php
package: bestyii/yii2-tabler
---

# Rating

`bestyii\tabler\Rating` displays a compact read-only rating baseline using Tabler icons.

## Demo

```php-demo
use bestyii\tabler\Rating;

echo Rating::widget([
    'value' => 4,
    'showValue' => true,
]);
```
