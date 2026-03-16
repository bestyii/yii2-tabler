---
title: ActiveForm 表单
description: Tabler 风格的表单组件
keywords: [form, 表单, 表单容器]
related: [ActiveField, TomSelect]
---

ActiveForm 是 Tabler 风格的表单容器组件，支持带图标的输入框。

## 基础用法
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'username')->textInput(['placeholder' => '输入用户名']);
echo $form->field($model, 'email')->textInput(['type' => 'email']);
ActiveForm::end();
```

## 带图标的输入框
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'username', ['iconPrepend' => 'user'])->textInput();
echo $form->field($model, 'email', ['iconPrepend' => 'mail'])->textInput(['type' => 'email']);
echo $form->field($model, 'phone', ['iconAppend' => 'phone'])->textInput(['type' => 'tel']);
ActiveForm::end();
```

## 带提示文本
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'password')->passwordInput()->hint('密码至少需要 8 个字符，包含大小写字母和数字');
echo $form->field($model, 'website')->textInput()->hint('以 http:// 或 https:// 开头');
ActiveForm::end();
```

## 水平布局
```php-demo
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin(['layout' => 'horizontal']);
echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'email')->textInput();
ActiveForm::end();
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `layout` | string | 'default' | 布局: default/horizontal/inline |
| `fieldClass` | string | 'ActiveField' | 字段类名 |

## 表单布局类型

| 布局 | 说明 |
|------|------|
| `default` | 垂直堆叠，标签在输入框上方 |
| `horizontal` | 标签和输入框在同一行 |
| `inline` | 表单元素排成一行 |
