---
title: AdvancedTable
description: Searchable and sortable table wrapper backed by List.js for dense local validation lanes.
related: [Table]
status: hybrid-ready
preview: /preview-lab/tables
mirror: /preview/datatables
source: src/AdvancedTable.php
test: tests/AdvancedTableTest.php
package: bestyii/yii2-tabler
---

# AdvancedTable

`bestyii\tabler\AdvancedTable` renders a searchable and sortable table card with client-side pagination.

## Demo

```php-demo
use bestyii\tabler\AdvancedTable;

echo AdvancedTable::widget([
    'title' => 'Advanced backlog grid',
    'description' => 'List.js keeps the first version searchable without leaving Yii2 widgets.',
    'searchPlaceholder' => 'Search backlog',
    'pageSize' => 10,
    'columns' => [
        ['attribute' => 'owner', 'label' => 'Owner', 'encode' => true],
        ['attribute' => 'lane', 'label' => 'Lane', 'encode' => true],
    ],
    'rows' => [
        ['owner' => 'Alice Wong', 'lane' => 'Mirror routing'],
        ['owner' => 'Ben Yu', 'lane' => 'Hybrid dashboard'],
    ],
]);
```
