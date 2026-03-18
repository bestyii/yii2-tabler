---
title: Nav
description: Primary navigation renderer for preview layouts and docs shell.
related: [Icon]
status: hybrid-ready
preview: /preview-lab/navigation
mirror: /preview/navigation
source: src/Nav.php
test: tests/NavTest.php
package: bestyii/yii2-tabler
---

# Nav

`bestyii\tabler\Nav` renders Tabler navigation lists with optional icons and dropdown children.

## Demo

```php-demo
use bestyii\tabler\Nav;

echo Nav::widget([
    'items' => [
        ['label' => 'Dashboard', 'url' => '/dashboard', 'icon' => 'home', 'active' => true],
        [
            'label' => 'Settings',
            'url' => '#',
            'items' => [
                ['label' => 'Profile', 'url' => '/profile'],
            ],
        ],
    ],
]);
```
