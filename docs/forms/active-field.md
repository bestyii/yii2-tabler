---
title: ActiveField 表单字段
description: 表单字段组件，支持带图标的输入框
keywords: [form, 表单, 字段, 输入框]
related: [ActiveForm, TomSelect]
---

ActiveField 是 Tabler 风格的表单字段组件，提供丰富的输入框样式。

## 带前置图标
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'username', [
    'iconPrepend' => 'user',
]);
ActiveForm::end();
```

## 带后置图标
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'amount', [
    'iconAppend' => 'currency-dollar',
]);
ActiveForm::end();
```

## 带提示文本
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'password')
    ->passwordInput()
    ->hint('密码必须包含大小写字母和数字');
ActiveForm::end();
```

## 组合使用
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'email', ['iconPrepend' => 'mail'])->textInput(['placeholder' => 'your@email.com']);
echo $form->field($model, 'phone', ['iconPrepend' => 'phone'])->textInput(['placeholder' => '+86 ...']);
echo $form->field($model, 'password', ['iconPrepend' => 'lock'])->passwordInput();
ActiveForm::end();
```

## 常用图标
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'search', ['iconPrepend' => 'search'])->textInput();
echo $form->field($model, 'calendar', ['iconPrepend' => 'calendar'])->textInput();
echo $form->field($model, 'location', ['iconPrepend' => 'map-pin'])->textInput();
echo $form->field($model, 'link', ['iconPrepend' => 'link'])->textInput();
ActiveForm::end();
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `iconPrepend` | string | - | 输入框前图标名称 |
| `iconAppend` | string | - | 输入框后图标名称 |
| `template` | string | '{label}\n{input}\n{hint}\n{error}' | 字段模板 |
| `labelOptions` | array | ['class' => 'form-label'] | 标签 HTML 属性 |
| `inputOptions` | array | ['class' => 'form-control'] | 输入框 HTML 属性 |
