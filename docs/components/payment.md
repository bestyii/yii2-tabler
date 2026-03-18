---
title: Payment
description: Provider badge helper for payment, billing and subscription UI.
related: [Badge]
status: hybrid-ready
preview: /preview-lab/profile
mirror: /preview/cards
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
