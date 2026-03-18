---
title: Typed
description: Typed.js wrapper for animated emphasis text in local validation shells.
related: [Icon]
status: hybrid-ready
preview: /preview-lab/plugins
source: src/Typed.php
test: tests/TypedTest.php
package: bestyii/yii2-tabler
---

# Typed

`bestyii\tabler\Typed` renders a fallback label and upgrades it with Typed.js when assets are available.

## Demo

```php-demo
use bestyii\tabler\Typed;

echo Typed::widget([
    'strings' => ['syncing locally', 'reviewing changes', 'closing release blockers'],
    'typedOptions' => [
        'typeSpeed' => 50,
        'backSpeed' => 30,
        'loop' => true,
    ],
]);
```
