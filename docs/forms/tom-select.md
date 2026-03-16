---
title: TomSelect 增强选择器
description: TomSelect 是一个功能强大的下拉选择器
keywords: [select, 选择器, 下拉, tom-select]
related: [ActiveForm, Badge]
---

TomSelect 是一个功能强大的下拉选择器，支持搜索、多选、创建新选项等功能。

## 基础用法
```php-demo
use bestyii\tabler\TomSelect;

echo TomSelect::widget([
    'name' => 'category',
    'items' => [1 => '分类 A', 2 => '分类 B', 3 => '分类 C'],
]);
```

## 在表单中使用
```php-demo
use bestyii\tabler\ActiveForm;
use bestyii\tabler\TomSelect;

$form = ActiveForm::begin();
echo $form->field($model, 'category_id')->widget(TomSelect::class, [
    'items' => [1 => '选项 1', 2 => '选项 2', '1' => '选项 3'],
]);
ActiveForm::end();
```

## 支持搜索
```php-demo
use bestyii\tabler\TomSelect;

echo TomSelect::widget([
    'name' => 'city',
    'items' => ['beijing' => '北京', 'shanghai' => '上海', 'guangzhou' => '广州'],
    'pluginOptions' => [
        'create' => false,
    ],
]);
```

## 允许创建新选项
```php-demo
use bestyii\tabler\TomSelect;

echo TomSelect::widget([
    'name' => 'tags',
    'items' => ['php' => 'PHP', 'js' => 'JavaScript', 'python' => 'Python'],
    'pluginOptions' => [
        'create' => true,
    ],
]);
```

## 多选模式
```php-demo
use bestyii\tabler\TomSelect;

echo TomSelect::widget([
    'name' => 'skills',
    'items' => ['php' => 'PHP', 'js' => 'JavaScript', 'python' => 'Python', 'go' => 'Go'],
    'options' => ['multiple' => true],
    'pluginOptions' => [
        'create' => false,
        'sortField' => ['field' => 'text', 'direction' => 'asc'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 选项列表 ['value' => 'label', ...] |
| `pluginOptions` | array | [] | 插件配置，详见 https://tom-select.js.org/ |

## pluginOptions 常用配置

| 选项 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `create` | bool | false | 是否允许创建新选项 |
| `sortField` | array | null | 排序字段配置 |
| `maxItems` | int | null | 最大可选数量 |
| `maxOptions` | int | null | 最大选项数量 |
| `placeholder` | string | - | 占位文本 |
| `persist` | bool | true | 是否持久化新创建的选项 |
