---
title: Avatar
description: User avatar widget with image, initials, icon and status support.
related: [Icon, Badge]
status: hybrid-ready
preview: /preview-lab/profile
mirror: /preview/profile
source: src/Avatar.php
test: tests/AvatarTest.php
package: bestyii/yii2-tabler
---

# Avatar

`bestyii\tabler\Avatar` renders a Tabler avatar with image, initials, icon and status dot support.

## Demo

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget([
    'text' => 'JD',
    'color' => 'blue',
    'status' => 'success',
]);
```
