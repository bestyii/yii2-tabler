---
title: SelectGroup 选择组
description: 选择组渲染一组样式化的单选按钮或复选框
keywords: [select, 选择, radio, checkbox, group]
related: [ColorInput, ActiveForm]
---

SelectGroup 渲染一组样式化的单选按钮或复选框，常用于设置页面或表单中替代传统的 radio/checkbox。

## 基础用法
```php-demo
use bestyii\tabler\SelectGroup;

echo SelectGroup::widget([
    'name' => 'size',
    'value' => 'md',
    'items' => [
        'sm' => '小',
        'md' => '中',
        'lg' => '大',
        'xl' => '超大',
    ],
]);
```

## 带图标
```php-demo
use bestyii\tabler\SelectGroup;

echo SelectGroup::widget([
    'name' => 'view',
    'value' => 'list',
    'items' => [
        'list' => ['label' => '列表', 'icon' => 'list'],
        'grid' => ['label' => '网格', 'icon' => 'layout-grid'],
        'table' => ['label' => '表格', 'icon' => 'table'],
    ],
]);
```

## 带描述
```php-demo
use bestyii\tabler\SelectGroup;

echo SelectGroup::widget([
    'name' => 'plan',
    'value' => 'pro',
    'items' => [
        'free' => ['label' => '免费版', 'description' => '适合个人使用'],
        'pro' => ['label' => '专业版', 'description' => '适合团队协作'],
        'enterprise' => ['label' => '企业版', 'description' => '适合大型组织'],
    ],
]);
```

## 多选模式 (Pills)
```php-demo
use bestyii\tabler\SelectGroup;

echo SelectGroup::widget([
    'name' => 'features[]',
    'value' => ['email', 'api'],
    'multiple' => true,
    'items' => [
        'email' => '邮件通知',
        'sms' => '短信提醒',
        'api' => 'API 访问',
        'report' => '报表导出',
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `name` | string | '' | 输入框 name 属性 |
| `value` | string\|array | null | 选中的值，多选时为数组 |
| `items` | array | [] | 选项列表，值可以是字符串或包含 label/icon/description 的数组 |
| `multiple` | bool | false | 是否允许多选（使用 checkbox） |
| `isBoxes` | bool | false | 是否使用 boxes 样式 |
| `size` | string | null | 尺寸，可选 'sm' |
| `options` | array | [] | 容器的 HTML 属性 |
| `inputOptions` | array | [] | 输入框的 HTML 属性 |

## items 数组格式

当需要更丰富的选项时，item 可以是数组：
```php
[
    'value' => [
        'label' => '显示文本',
        'icon' => 'icon-name',        // 可选，Tabler 图标名
        'description' => '描述文字',  // 可选
    ],
]
```
