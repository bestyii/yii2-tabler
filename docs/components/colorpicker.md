---
title: Colorpicker
description: Color input wrapper backed by Coloris for palette-oriented settings screens.
related: [Badge]
status: hybrid-ready
preview: /preview-lab/settings
mirror: /preview/colorpicker
source: src/Colorpicker.php
test: tests/ColorpickerTest.php
package: bestyii/yii2-tabler
---

# Colorpicker

`bestyii\tabler\Colorpicker` renders a text input and initializes Coloris for palette picking.

## Demo

```php-demo
use bestyii\tabler\Colorpicker;

echo Colorpicker::widget([
    'name' => 'brand_color',
    'value' => '#066fd1',
]);
```
