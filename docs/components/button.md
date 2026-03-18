---
title: Button
description: Minimal Button widget used by the docs shell and preview bootstrap.
related: [Badge, Icon]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/Button.php
test: tests/ButtonTest.php
package: bestyii/yii2-tabler
---

# Button

`bestyii\tabler\Button` renders a Tabler-styled button or link.

## Demo

```php-demo
use bestyii\tabler\Button;

echo Button::widget([
    'label' => 'Open Preview',
    'icon' => 'eye',
    'url' => '/preview',
    'color' => 'primary',
]);
```
