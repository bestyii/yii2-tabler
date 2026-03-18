---
title: Table
description: Declarative responsive Tabler table wrapper for dense data layouts.
related: [Pagination, Status, Tag]
status: hybrid-ready
preview: /preview-lab/tables
mirror: /preview/tables
source: src/Table.php
test: tests/TableTest.php
package: bestyii/yii2-tabler
---

# Table

`bestyii\tabler\Table` renders responsive Tabler tables from column definitions and row data.

## Demo

```php-demo
use bestyii\tabler\Table;

echo Table::widget([
    'striped' => true,
    'cardTable' => true,
    'rows' => [
        ['owner' => 'Alice Wong', 'status' => 'Ready'],
        ['owner' => 'Ben Yu', 'status' => 'Review'],
    ],
    'columns' => [
        ['attribute' => 'owner', 'label' => 'Owner', 'rowHeader' => true, 'encode' => true],
        ['attribute' => 'status', 'label' => 'Status', 'encode' => true],
    ],
]);
```
