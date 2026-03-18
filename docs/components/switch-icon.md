---
title: SwitchIcon
description: Toggle-style icon button for favorite, bookmark and reaction affordances.
related: [Button]
status: hybrid-ready
preview: /preview-lab/buttons
mirror: /preview/buttons
source: src/SwitchIcon.php
test: tests/SwitchIconTest.php
package: bestyii/yii2-tabler
---

# SwitchIcon

`bestyii\tabler\SwitchIcon` renders Tabler's two-state icon button markup.

## Demo

```php-demo
use bestyii\tabler\SwitchIcon;

echo SwitchIcon::widget([
    'icon' => 'heart',
    'active' => true,
]);
```
