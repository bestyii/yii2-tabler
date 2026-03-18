---
title: Progress
description: Progress bar widget with stacked and labeled variants.
related: [Badge]
---

# Progress

`bestyii\tabler\Progress` renders Tabler progress bars, including striped and stacked variants.

## Demo

```php-demo
use bestyii\tabler\Progress;

echo Progress::widget([
    'percent' => 72,
    'label' => '72%',
    'color' => 'success',
    'striped' => true,
]);
```
