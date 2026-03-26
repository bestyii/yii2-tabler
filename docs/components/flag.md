---
title: Flag
description: Country flag helper backed by Tabler flag classes for locale, region and market selectors.
related: [NavSegmented]
status: hybrid-ready
preview: /preview-lab/navigation
mirror: /preview/flag
source: src/Flag.php
test: tests/FlagTest.php
package: bestyii/yii2-tabler
---

# Flag

`bestyii\tabler\Flag` renders a flag span using Tabler's country utility classes.

## Demo

```php-demo
use bestyii\tabler\Flag;

echo Flag::widget([
    'country' => 'us',
    'size' => 'sm',
]);
```

## Asset Ownership

- `Flag` automatically registers `bestyii\tabler\assets\TablerFlagsAsset`.
- If you render raw `flag` / `flag-country-*` classes outside the widget, register `TablerFlagsAsset` explicitly in the view.
