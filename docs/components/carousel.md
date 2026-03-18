---
title: Carousel
description: Bootstrap carousel wrapper for rotating card-like validation content.
related: [Card]
status: hybrid-ready
preview: /preview-lab/plugins
mirror: /preview/carousel
source: src/Carousel.php
test: tests/CarouselTest.php
package: bestyii/yii2-tabler
---

# Carousel

`bestyii\tabler\Carousel` wraps Bootstrap carousel markup in a Yii2 widget API.

## Demo

```php-demo
use bestyii\tabler\Carousel;

echo Carousel::widget([
    'items' => [
        ['content' => '<div class="p-5 bg-primary text-white rounded">Slide 1</div>'],
        ['content' => '<div class="p-5 bg-success text-white rounded">Slide 2</div>'],
    ],
]);
```
