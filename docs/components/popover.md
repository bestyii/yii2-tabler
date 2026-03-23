---
title: Popover
description: Bootstrap popover trigger rendered through Tabler assets and button styles.
related: [Button, Modal]
status: hybrid-ready
preview: /preview-lab/modals
mirror: /preview/modals
source: src/Popover.php
test: tests/PopoverTest.php
package: bestyii/yii2-tabler
---

# Popover

`bestyii\tabler\Popover` registers Bootstrap popover behaviour on top of the Tabler asset stack.

## Demo

```php-demo
use bestyii\tabler\Popover;

echo Popover::widget([
    'title' => 'Quick details',
    'content' => '<strong>Popover body</strong>',
    'toggleButton' => [
        'label' => 'Inspect',
    ],
]);
```
