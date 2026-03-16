---
title: ImageCheck 图片选择器
description: 图片选择器用于让用户从一组图片中选择
keywords: [image, check, 图片, 选择器]
related: [ColorInput, SelectGroup]
---

ImageCheck 渲染一组可视化的图片选择输入，支持单选和多选模式，常用于模板选择、头像选择等场景。

## 基础用法
```php-demo
use bestyii\tabler\ImageCheck;

echo ImageCheck::widget([
    'name' => 'avatar',
    'value' => 'avatar1',
    'items' => [
        ['value' => 'avatar1', 'image' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=200&h=200&fit=crop', 'alt' => 'Avatar A'],
        ['value' => 'avatar2', 'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&h=200&fit=crop', 'alt' => 'Avatar B'],
        ['value' => 'avatar3', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop', 'alt' => 'Avatar C'],
    ],
]);
```

## 多选模式
```php-demo
use bestyii\tabler\ImageCheck;

echo ImageCheck::widget([
    'name' => 'templates[]',
    'value' => ['t1'],
    'multiple' => true,
    'items' => [
        ['value' => 't1', 'image' => 'https://images.unsplash.com/photo-1557683316-973673baf926?w=300&h=200&fit=crop', 'alt' => '模板 1'],
        ['value' => 't2', 'image' => 'https://images.unsplash.com/photo-1579546929518-9e396f3cc809?w=300&h=200&fit=crop', 'alt' => '模板 2'],
        ['value' => 't3', 'image' => 'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=300&h=200&fit=crop', 'alt' => '模板 3'],
    ],
]);
```

## 自定义列宽
```php-demo
use bestyii\tabler\ImageCheck;

echo ImageCheck::widget([
    'name' => 'layout',
    'value' => 'layout2',
    'items' => [
        ['value' => 'layout1', 'image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=150&h=100&fit=crop', 'alt' => '布局 1', 'col' => 'col-4'],
        ['value' => 'layout2', 'image' => 'https://images.unsplash.com/photo-1550684376-efcbd6e3f031?w=150&h=100&fit=crop', 'alt' => '布局 2', 'col' => 'col-4'],
        ['value' => 'layout3', 'image' => 'https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?w=150&h=100&fit=crop', 'alt' => '布局 3', 'col' => 'col-4'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `name` | string | '' | 输入框 name 属性 |
| `value` | string\|array | null | 选中的值，多选时为数组 |
| `items` | array | [] | 图片选项数组 |
| `multiple` | bool | false | 是否允许多选 |
| `options` | array | [] | 容器的 HTML 属性 |

## items 数组格式

每个 item 必须包含：
```php
[
    'value' => 'option-value',    // 必需，选项值
    'image' => 'url/to/image',    // 必需，图片 URL
    'alt' => '图片描述',           // 可选，alt 文本
    'col' => 'col-6 col-sm-4',    // 可选，列宽类名，默认 'col-6 col-sm-4'
]
```
