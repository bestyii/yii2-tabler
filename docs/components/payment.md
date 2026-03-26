---
title: Payment
description: Provider badge helper for payment, billing and subscription UI.
related: [Badge]
status: hybrid-ready
preview: /preview-lab/payment-providers
mirror: /preview/payment-providers
source: src/Payment.php
test: tests/PaymentTest.php
package: bestyii/yii2-tabler
---

# Payment

`bestyii\tabler\Payment` renders Tabler payment-provider badges for billing and checkout surfaces.

## Demo

```php-demo
use bestyii\tabler\Payment;

echo Payment::widget([
    'provider' => 'mastercard',
    'size' => 'sm',
]);
```

## Asset Ownership

- `Payment` automatically registers `bestyii\tabler\assets\TablerPaymentsAsset`.
- If you render raw `payment` / `payment-provider-*` classes outside the widget, register `TablerPaymentsAsset` explicitly in the view.
