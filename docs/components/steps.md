---
title: Steps
description: Multi-step progress tracker for rollout and setup flows.
related: [Status, Icon]
status: hybrid-ready
preview: /preview-lab/navigation
mirror: /preview/steps
source: src/Steps.php
test: tests/StepsTest.php
package: bestyii/yii2-tabler
---

# Steps

`bestyii\tabler\Steps` renders a simple ordered step list with active and completed states.

## Demo

```php-demo
use bestyii\tabler\Steps;

echo Steps::widget([
    'items' => [
        ['label' => 'Mirror', 'completed' => true],
        ['label' => 'Hybrid', 'active' => true, 'description' => 'Current validation lane'],
        ['label' => 'Composed'],
    ],
]);
```
