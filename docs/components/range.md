---
title: Range
description: Native or noUiSlider-powered range input wrapper for progress-style controls.
related: [Progress]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/form-elements
source: src/Range.php
test: tests/RangeTest.php
package: bestyii/yii2-tabler
---

# Range

`bestyii\tabler\Range` renders either a native range input or a noUiSlider-backed control.

## Demo

```php-demo
use bestyii\tabler\Range;

echo Range::widget([
    'name' => 'quality_target',
    'value' => 80,
    'min' => 0,
    'max' => 100,
    'step' => 5,
]);
```
