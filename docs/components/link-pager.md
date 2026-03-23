---
title: LinkPager
description: Pagination widget bound to yii\data\Pagination with Bootstrap-compatible page markup.
related: [Pagination, Button]
status: hybrid-ready
preview: /preview-lab/tables
mirror: /preview/pagination
source: src/LinkPager.php
test: tests/LinkPagerTest.php
package: bestyii/yii2-tabler
---

# LinkPager

`bestyii\tabler\LinkPager` is the paginator you use when the page model already lives in `yii\data\Pagination`.

## Demo

```php-demo
use bestyii\tabler\LinkPager;
use yii\data\Pagination;

echo LinkPager::widget([
    'pagination' => new Pagination([
        'totalCount' => 120,
        'pageSize' => 10,
        'page' => 2,
        'route' => 'site/index',
    ]),
]);
```
