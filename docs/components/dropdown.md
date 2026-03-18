---
title: Dropdown
description: Dropdown menu renderer for actions and nested navigation.
related: [Button, Icon]
---

# Dropdown

`bestyii\tabler\Dropdown` renders a Tabler dropdown menu with icons, headers, dividers and nested items.

## Demo

```php-demo
use bestyii\tabler\Dropdown;

echo Dropdown::widget([
    'align' => 'end',
    'items' => [
        ['label' => 'Profile', 'icon' => 'user', 'url' => '#'],
        '-',
        ['label' => 'Settings', 'url' => '#'],
    ],
]);
```
