---
title: ToggleButtonGroup
description: Radio and checkbox button groups using btn-check and Tabler button variants.
related: [ButtonGroup, ActiveField]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/forms
source: src/ToggleButtonGroup.php
test: tests/ToggleButtonGroupTest.php
package: bestyii/yii2-tabler
---

# ToggleButtonGroup

`bestyii\tabler\ToggleButtonGroup` renders radio or checkbox groups as Tabler-styled toggle buttons.

## Demo

```php-demo
use bestyii\tabler\ToggleButtonGroup;

echo ToggleButtonGroup::widget([
    'name' => 'visibility',
    'value' => 'team',
    'type' => ToggleButtonGroup::TYPE_RADIO,
    'items' => [
        'private' => 'Private',
        'team' => 'Team',
    ],
]);
```
