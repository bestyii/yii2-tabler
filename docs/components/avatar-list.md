---
title: AvatarList
description: Group multiple avatar widgets into a compact list for contributors, reviewers and assignees.
related: [Avatar]
status: hybrid-ready
preview: /preview-lab/profile
mirror: /preview/avatar-list
source: src/AvatarList.php
test: tests/AvatarListTest.php
package: bestyii/yii2-tabler
---

# AvatarList

`bestyii\tabler\AvatarList` renders a compact avatar group using the package `Avatar` widget for each item.

## Demo

```php-demo
use bestyii\tabler\AvatarList;

echo AvatarList::widget([
    'stacked' => true,
    'items' => [
        ['text' => 'BY', 'color' => 'blue'],
        ['text' => 'QA', 'color' => 'green'],
        ['text' => 'UX', 'color' => 'orange'],
    ],
    'placeholderText' => '+2',
]);
```
