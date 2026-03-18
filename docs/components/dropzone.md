---
title: Dropzone
description: Drag-and-drop upload surface backed by the Dropzone library.
related: [Button]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/dropzone
source: src/Dropzone.php
test: tests/DropzoneTest.php
package: bestyii/yii2-tabler
---

# Dropzone

`bestyii\tabler\Dropzone` renders a drag-and-drop upload area and initializes Dropzone.

## Demo

```php-demo
use bestyii\tabler\Dropzone;

echo Dropzone::widget([
    'url' => '/upload',
    'messageTitle' => 'Drop files here',
    'messageDescription' => 'Upload local preview notes.',
]);
```
