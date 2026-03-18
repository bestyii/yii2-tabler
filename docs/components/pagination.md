---
title: Pagination
description: Tabler-friendly pagination list renderer.
related: [Button]
status: hybrid-ready
preview: /preview-lab/tables
mirror: /preview/pagination
source: src/Pagination.php
test: tests/PaginationTest.php
package: bestyii/yii2-tabler
---

# Pagination

`bestyii\tabler\Pagination` renders page items with active and disabled states.

## Demo

```php-demo
use bestyii\tabler\Pagination;

echo Pagination::widget([
    'items' => [
        ['label' => 'Prev', 'disabled' => true],
        ['label' => '1', 'active' => true],
        ['label' => '2', 'url' => '#'],
    ],
]);
```
