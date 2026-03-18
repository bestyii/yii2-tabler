---
title: Select
description: Enhanced select input backed by Tom Select for local form validation pages.
related: [Button]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/form-elements
source: src/Select.php
test: tests/SelectTest.php
package: bestyii/yii2-tabler
---

# Select

`bestyii\tabler\Select` renders a Bootstrap 5 select and enhances it with Tom Select.

## Demo

```php-demo
use bestyii\tabler\Select;

echo Select::widget([
    'name' => 'plan',
    'value' => 'team',
    'prompt' => 'Choose a scope',
    'items' => [
        'starter' => 'Starter',
        'team' => 'Team',
        'enterprise' => 'Enterprise',
    ],
]);
```
