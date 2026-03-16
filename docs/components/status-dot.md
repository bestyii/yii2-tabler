---
title: StatusDot 状态点
description: 状态点是一个简单的彩色圆点，用于指示状态
keywords: [status dot, 状态点, 指示器]
related: [Status, Badge]
---

状态点组件是一个简单的彩色圆点，用于指示状态。

## 基础用法

```php-demo
use bestyii\tabler\StatusDot;

echo StatusDot::widget(['color' => 'primary']);
echo StatusDot::widget(['color' => 'success']);
echo StatusDot::widget(['color' => 'warning']);
echo StatusDot::widget(['color' => 'danger']);
```

## 动画效果

```php-demo
use bestyii\tabler\StatusDot;

echo StatusDot::widget(['color' => 'primary', 'animated' => true]);
echo StatusDot::widget(['color' => 'success', 'animated' => true]);
echo StatusDot::widget(['color' => 'warning', 'animated' => true]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `color` | string | 'primary' | 颜色 |
| `animated` | bool | false | 是否显示动画 |

## 使用场景

- 表格中的状态指示
- 用户在线状态
- 任务完成状态
