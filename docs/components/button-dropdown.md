---
title: ButtonDropdown
description: Split or single-button dropdown trigger rendered in Tabler button styles.
related: [Button, DropdownMenu]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/ButtonDropdown.php
test: tests/ButtonDropdownTest.php
package: bestyii/yii2-tabler
---

# ButtonDropdown

`bestyii\tabler\ButtonDropdown` combines a primary action button with a Tabler dropdown menu.

## Demo

```php-demo
use bestyii\tabler\ButtonDropdown;

echo ButtonDropdown::widget([
    'label' => 'Actions',
    'color' => 'secondary',
    'dropdown' => [
        'items' => [
            ['label' => 'Edit', 'url' => '#'],
            ['label' => 'Archive', 'url' => '#'],
        ],
    ],
]);
```
