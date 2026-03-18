---
title: Wysiwyg
description: Rich text editor wrapper backed by Hugerte for local-first form composition.
related: [Select]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/wysiwyg
source: src/Wysiwyg.php
test: tests/WysiwygTest.php
package: bestyii/yii2-tabler
---

# Wysiwyg

`bestyii\tabler\Wysiwyg` renders a textarea and enhances it with Hugerte so rich text composition stays inside the Yii2 widget layer.

## Demo

```php-demo
use bestyii\tabler\Wysiwyg;

echo Wysiwyg::widget([
    'name' => 'releaseSummary',
    'value' => '<p>Ship the local-first baseline after widget smoke is green.</p>',
    'editorOptions' => [
        'height' => 240,
    ],
]);
```
