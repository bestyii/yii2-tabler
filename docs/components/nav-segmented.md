---
title: NavSegmented
description: Segmented navigation control for compact mode switches and bounded option sets.
related: [Nav]
status: hybrid-ready
preview: /preview-lab/navigation
mirror: /preview/nav-segmented
source: src/NavSegmented.php
test: tests/NavSegmentedTest.php
package: bestyii/yii2-tabler
---

# NavSegmented

`bestyii\tabler\NavSegmented` renders Tabler segmented controls using buttons, anchors or radio-backed labels.

## Demo

```php-demo
use bestyii\tabler\NavSegmented;

echo NavSegmented::widget([
    'items' => [
        ['label' => 'Overview', 'active' => true],
        ['label' => 'Compare'],
        ['label' => 'Docs'],
    ],
    'fullWidth' => true,
]);
```
