---
title: ButtonToolbar
description: Toolbar wrapper that composes multiple button groups into a single action bar.
related: [ButtonGroup, ButtonDropdown]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/ButtonToolbar.php
test: tests/ButtonToolbarTest.php
package: bestyii/yii2-tabler
---

# ButtonToolbar

`bestyii\tabler\ButtonToolbar` is useful for dense header actions where several button groups need shared alignment.

## Demo

```php-demo
use bestyii\tabler\ButtonToolbar;

echo ButtonToolbar::widget([
    'buttonGroups' => [
        [
            'buttons' => [
                ['label' => 'Save', 'color' => 'primary'],
                ['label' => 'Preview', 'color' => 'secondary'],
            ],
        ],
        [
            'buttons' => [
                ['label' => 'Delete', 'color' => 'danger'],
            ],
        ],
    ],
]);
```
