---
title: ButtonGroup
description: Group related actions into horizontal or vertical button stacks, with optional radio-style selection and dropdown splits.
related: [Button, DropdownMenu]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/ButtonGroup.php
test: tests/ButtonGroupTest.php
package: bestyii/yii2-tabler
---

# ButtonGroup

`bestyii\tabler\ButtonGroup` renders grouped action controls without dropping back to inline HTML.

## Demo

```php-demo
use bestyii\tabler\ButtonGroup;

echo ButtonGroup::widget([
    'items' => [
        ['label' => 'Overview', 'active' => true, 'color' => 'secondary', 'outline' => true],
        ['label' => 'Queue', 'color' => 'secondary', 'outline' => true],
        ['label' => 'Deploy', 'icon' => 'rocket', 'color' => 'primary'],
    ],
]);
```
