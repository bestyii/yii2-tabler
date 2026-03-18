---
title: Toast
description: Notification popup shell for short-lived messages.
related: [Avatar, Icon]
status: hybrid-ready
preview: /preview-lab/settings
mirror: /preview/toasts
source: src/Toast.php
test: tests/ToastTest.php
package: bestyii/yii2-tabler
---

# Toast

`bestyii\tabler\Toast` renders a Tabler toast with header metadata and body content.

## Demo

```php-demo
use bestyii\tabler\Toast;

echo Toast::widget([
    'title' => 'Preview ready',
    'subtitle' => 'now',
    'body' => 'Mirror pages can be opened from the preview module.',
    'icon' => 'check',
]);
```
