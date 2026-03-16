---
title: Timeline 时间线
description: 时间线用于显示按时间顺序排列的事件
keywords: [timeline, 时间线, 事件, 历史]
related: [Card, Badge]
---

时间线组件用于显示按时间顺序排列的事件列表。

## 基础用法
```php-demo
use bestyii\tabler\Timeline;

echo Timeline::widget([
    'items' => [
        ['title' => '订单创建', 'content' => '用户张三下单成功', 'time' => '10:30', 'color' => 'primary'],
        ['title' => '订单支付', 'content' => '支付完成', 'time' => '10:35', 'color' => 'success'],
        ['title' => '订单发货', 'content' => '包裹已发出', 'time' => '14:00', 'color' => 'info'],
    ],
]);
```

## 带图标
```php-demo
use bestyii\tabler\Timeline;

echo Timeline::widget([
    'items' => [
        ['title' => '创建项目', 'icon' => 'plus', 'color' => 'primary'],
        ['title' => '提交代码', 'icon' => 'git-commit', 'color' => 'success'],
        ['title' => '合并分支', 'icon' => 'git-merge', 'color' => 'info'],
    ],
]);
```

## 带头像
```php-demo
use bestyii\tabler\Timeline;

echo Timeline::widget([
    'items' => [
        ['title' => '张三', 'content' => '提交了新代码', 'time' => '5分钟前', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop'],
        ['title' => '李四', 'content' => '合并了分支', 'time' => '10分钟前', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=40&h=40&fit=crop'],
    ],
]);
```

## 复杂时间线
```php-demo
use bestyii\tabler\Timeline;

echo Timeline::widget([
    'simple' => false,
    'items' => [
        ['title' => '订单已创建', 'time' => '2024-01-15 10:30', 'icon' => 'shopping-cart', 'color' => 'primary'],
        ['title' => '支付成功', 'time' => '2024-03-15 10:35', 'icon' => 'credit-card', 'color' => 'success'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 时间线项目列表 |
| `simple` | bool | true | 是否为简单模式 |

## items 配置

每个 item 支持以下属性：

| 属性 | 类型 | 说明 |
|------|------|------|
| `title` | string | 标题 |
| `content` | string | 内容描述 |
| `time` | string | 时间 |
| `icon` | string | 图标名称 |
| `color` | string | 颜色 |
| `image` | string | 头像 URL |
