---
title: ActiveField
description: Tabler field renderer with form-control, form-select and form-check defaults.
related: [ActiveForm, ToggleButtonGroup]
status: hybrid-ready
preview: /preview-lab/forms
mirror: /preview/forms
source: src/ActiveField.php
test: tests/ActiveFormTest.php
package: bestyii/yii2-tabler
---

# ActiveField

`bestyii\tabler\ActiveField` is the field implementation used by `ActiveForm`, including Tabler-friendly error, hint and choice markup.

## Demo

```php-demo
use bestyii\tabler\ActiveForm;
use yii\base\DynamicModel;

$model = new DynamicModel([
    'notifications' => ['email'],
]);
$model->addRule(['notifications'], 'safe');

ob_start();
$form = ActiveForm::begin([
    'action' => ['/site/save'],
    'layout' => ActiveForm::LAYOUT_HORIZONTAL,
]);
echo $form->field($model, 'notifications')->inline()->checkboxList([
    'email' => 'Email',
    'sms' => 'SMS',
]);
ActiveForm::end();

echo ob_get_clean();
```
