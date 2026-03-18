---
title: Datepicker
description: Litepicker-based date input wrapper for local-first release forms.
related: [Icon]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/form-elements
source: src/Datepicker.php
test: tests/DatepickerTest.php
package: bestyii/yii2-tabler
---

# Datepicker

`bestyii\tabler\Datepicker` wraps a text input or inline container and initializes Litepicker.

## Demo

```php-demo
use bestyii\tabler\Datepicker;

echo Datepicker::widget([
    'name' => 'release_window',
    'value' => '2026-03-18',
    'placeholder' => 'Select a date',
    'withIcon' => true,
]);
```
