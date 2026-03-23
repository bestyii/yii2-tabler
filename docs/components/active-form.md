---
title: ActiveForm
description: Tabler-flavoured form shell compatible with Yii2 active field workflows.
related: [ActiveField, Button]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/forms
source: src/ActiveForm.php
test: tests/ActiveFormTest.php
package: bestyii/yii2-tabler
---

# ActiveForm

`bestyii\tabler\ActiveForm` provides a Tabler-styled replacement for the common `yii2-bootstrap5` active form shell.

## Demo

```php-demo
use bestyii\tabler\ActiveForm;
use yii\base\DynamicModel;

$model = new DynamicModel([
    'name' => 'Alice Wong',
    'role' => 'admin',
]);
$model->addRule(['name', 'role'], 'string');

ob_start();
$form = ActiveForm::begin([
    'action' => ['/site/save'],
]);
echo $form->field($model, 'name')->hint('Shown in workspace headers');
echo $form->field($model, 'role')->dropDownList([
    'admin' => 'Admin',
    'editor' => 'Editor',
]);
ActiveForm::end();

echo ob_get_clean();
```
