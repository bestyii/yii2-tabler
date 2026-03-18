---
title: VectorMap
description: jsVectorMap wrapper for geographic summaries and delivery coverage views.
related: [Chart]
status: hybrid-ready
preview: /preview-lab/plugins
mirror: /preview/maps-vector
source: src/VectorMap.php
test: tests/VectorMapTest.php
package: bestyii/yii2-tabler
---

# VectorMap

`bestyii\tabler\VectorMap` wraps jsVectorMap and keeps map initialization inside the widget layer.

## Demo

```php-demo
use bestyii\tabler\VectorMap;

echo VectorMap::widget([
    'mapOptions' => [
        'map' => 'world_merc',
        'zoomOnScroll' => false,
    ],
    'options' => ['style' => 'min-height: 260px'],
]);
```
