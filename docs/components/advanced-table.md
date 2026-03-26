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
        ['attribute' => 'owner', 'label' => 'Owner', 'format' => AdvancedTable::FORMAT_TEXT],
        ['attribute' => 'lane', 'label' => 'Lane', 'format' => AdvancedTable::FORMAT_TEXT],
    ],
    'rows' => [
        ['owner' => 'Alice Wong', 'lane' => 'Mirror routing'],
        ['owner' => 'Ben Yu', 'lane' => 'Hybrid dashboard'],
    ],
]);
```

## Column Contract

- `format` is the primary contract for cell rendering.
- `AdvancedTable::FORMAT_TEXT` is the default and escapes attribute values, callback results and custom `value`.
- `AdvancedTable::FORMAT_HTML` should be reserved for trusted HTML or nested widget output.
- Legacy `encode => true|false` remains supported for compatibility, but new code should use `format`.
