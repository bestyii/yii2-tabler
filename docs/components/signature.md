---
title: Signature
description: Signature canvas wrapper backed by Signature Pad for approval capture inside form-oriented validation lanes.
related: [Dropzone]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/signatures
source: src/Signature.php
test: tests/SignatureTest.php
package: bestyii/yii2-tabler
---

# Signature

`bestyii\tabler\Signature` renders a responsive signature canvas and keeps a hidden input synchronized with the drawn output.

## Demo

```php-demo
use bestyii\tabler\Signature;

echo Signature::widget([
    'name' => 'approvalSignature',
    'height' => 160,
    'pluginOptions' => [
        'penColor' => '#0054a6',
    ],
]);
```
