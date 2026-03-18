---
title: DropdownMenu
description: Standalone dropdown menu helper for visible demo menus, checklist menus and split-button workflows.
related: [Dropdown, ButtonGroup]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/DropdownMenu.php
test: tests/DropdownMenuTest.php
package: bestyii/yii2-tabler
---

# DropdownMenu

`bestyii\tabler\DropdownMenu` renders a dropdown menu directly, including headers, dividers and checkbox or radio choices.

## Demo

```php-demo
use bestyii\tabler\DropdownMenu;

echo DropdownMenu::widget([
    'show' => true,
    'items' => [
        ['type' => 'header', 'label' => 'Actions'],
        ['label' => 'Open preview', 'icon' => 'layout'],
        '-',
        ['type' => 'checkbox', 'label' => 'Keep pinned', 'checked' => true],
    ],
]);
```
