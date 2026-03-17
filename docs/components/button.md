---
title: Button
description: Minimal Button widget used by the docs shell and preview bootstrap.
related: [Badge, Icon]
---

# Button

`bestyii\tabler\Button` renders a Tabler-styled button or link.

## Demo

```php-demo
use bestyii\tabler\Button;

echo Button::widget([
    'label' => 'Open Preview',
    'icon' => 'eye',
    'url' => '/index.php?r=preview/default/index',
    'color' => 'primary',
]);
```
