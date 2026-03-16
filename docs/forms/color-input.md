---
title: ColorInput 颜色选择器
description: 颜色选择器用于让用户从预设颜色中选择一个或多个颜色
keywords: [color, 颜色, 选择器, picker]
related: [ActiveForm, SelectGroup]
---

ColorInput 渲染一组可视化的颜色选择输入，支持单选和多选模式。

## 基础用法
```php-demo
use bestyii\tabler\ColorInput;

echo ColorInput::widget([
    'name' => 'color',
    'value' => 'blue',
    'items' => [
        'blue' => 'blue',
        'azure' => 'azure',
        'indigo' => 'indigo',
        'purple' => 'purple',
        'pink' => 'pink',
        'red' => 'red',
        'orange' => 'orange',
        'yellow' => 'yellow',
        'lime' => 'lime',
        'green' => 'green',
        'teal' => 'teal',
        'cyan' => 'cyan',
    ],
]);
```

## 圆形样式
```php-demo
use bestyii\tabler\ColorInput;

echo ColorInput::widget([
    'name' => 'color_rounded',
    'value' => 'green',
    'rounded' => true,
    'items' => [
        'blue' => 'blue',
        'red' => 'red',
        'yellow' => 'yellow',
        'green' => 'green',
        'purple' => 'purple',
    ],
]);
```

## 多选模式
```php-demo
use bestyii\tabler\ColorInput;

echo ColorInput::widget([
    'name' => 'colors[]',
    'value' => ['blue', 'green'],
    'multiple' => true,
    'items' => [
        'blue' => 'blue',
        'azure' => 'azure',
        'indigo' => 'indigo',
        'purple' => 'purple',
        'pink' => 'pink',
        'red' => 'red',
        'orange' => 'orange',
        'yellow' => 'yellow',
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `name` | string | '' | 输入框 name 属性 |
| `value` | string\|array | null | 选中的值，多选时为数组 |
| `items` | array | [] | 颜色选项，键为值，值为 CSS 颜色类名 |
| `multiple` | bool | false | 是否允许多选 |
| `rounded` | bool | false | 是否使用圆形样式 |
| `options` | array | [] | 容器的 HTML 属性 |
