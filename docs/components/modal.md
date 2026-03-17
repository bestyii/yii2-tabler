---
title: Modal
description: Dialog shell for confirmation flows and embedded forms.
related: [Button]
---

# Modal

`bestyii\tabler\Modal` renders a Bootstrap 5 / Tabler modal container with title, body and footer slots.

## Demo

```php-demo
use bestyii\tabler\Button;
use bestyii\tabler\Modal;

echo Modal::widget([
    'title' => 'Create project',
    'body' => '<p class="mb-0">The modal body can contain forms or custom HTML.</p>',
    'footer' => Button::widget([
        'label' => 'Save',
        'color' => 'primary',
    ]),
    'status' => 'primary',
]);
```
