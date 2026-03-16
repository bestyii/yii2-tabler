---
title: Status 状态
description: 状态组件用于显示带文本的状态指示
keywords: [status, 状态, 指示器]
related: [StatusDot, Badge]
---

状态组件用于显示带文本的状态指示，如"在线"、"离线"等。

## 基础用法

```php-demo
use bestyii\tabler\Status;

echo Status::widget(['text' => '在线', 'color' => 'success']);
echo Status::widget(['text' => '离线', 'color' => 'danger']);
echo Status::widget(['text' => '忙碌', 'color' => 'warning']);
echo Status::widget(['text' => '离开', 'color' => 'secondary']);
```

## 无圆点

```php-demo
use bestyii\tabler\Status;

echo Status::widget(['text' => '管理员', 'color' => 'primary', 'dot' => false]);
echo Status::widget(['text' => '用户', 'color' => 'secondary', 'dot' => false]);
```

## 轻量样式

```php-demo
use bestyii\tabler\Status;

echo Status::widget(['text' => '成功', 'color' => 'success', 'lite' => true]);
echo Status::widget(['text' => '警告', 'color' => 'warning', 'lite' => true]);
echo Status::widget(['text' => '危险', 'color' => 'danger', 'lite' => true]);
```

## 动画效果

```php-demo
use bestyii\tabler\Status;

echo Status::widget(['text' => '处理中', 'color' => 'info', 'animated' => true]);
```

## 状态指示器

使用 `indicator` 模式显示 3 个圆形动画：

```php-demo
use bestyii\tabler\Status;

echo Status::widget(['indicator' => true, 'color' => 'primary']);
echo Status::widget(['indicator' => true, 'color' => 'success', 'animated' => true]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `text` | string | '' | 状态文本 |
| `color` | string | '' | 颜色 |
| `dot` | bool | true | 是否显示圆点 |
| `lite` | bool | false | 是否轻量样式 |
| `animated` | bool | false | 是否显示动画 |
| `indicator` | bool | false | 是否使用 3 圆点指示器 |
