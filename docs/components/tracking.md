---
title: Tracking 追踪条
description: 追踪条用于可视化活动日志或进度状态
keywords: [tracking, 追踪, 进度, activity]
related: [Progress, Timeline]
---

Tracking 用于可视化一段时间内的活动或状态，每个色块代表一个活动，支持工具提示。

## 基础用法
```php-demo
use bestyii\tabler\Tracking;

echo Tracking::widget([
    'items' => [
        ['color' => 'success', 'tooltip' => '在线'],
        ['color' => 'success', 'tooltip' => '在线'],
        ['color' => 'warning', 'tooltip' => '忙碌'],
        ['color' => 'success', 'tooltip' => '在线'],
        ['color' => 'danger', 'tooltip' => '离线'],
        ['color' => 'success', 'tooltip' => '在线'],
        ['color' => 'success', 'tooltip' => '在线'],
    ],
]);
```

## 多种状态
```php-demo
use bestyii\tabler\Tracking;

echo Tracking::widget([
    'items' => [
        ['color' => 'success', 'tooltip' => '已完成'],
        ['color' => 'success', 'tooltip' => '已完成'],
        ['color' => 'success', 'tooltip' => '已完成'],
        ['color' => 'warning', 'tooltip' => '进行中'],
        ['color' => 'warning', 'tooltip' => '进行中'],
        ['color' => 'secondary', 'tooltip' => '待处理'],
        ['color' => 'secondary', 'tooltip' => '待处理'],
        ['color' => 'secondary', 'tooltip' => '待处理'],
    ],
]);
```

## 服务状态监控
```php-demo
use bestyii\tabler\Tracking;

echo Tracking::widget([
    'items' => [
        ['color' => 'success', 'tooltip' => '1月: 正常'],
        ['color' => 'success', 'tooltip' => '2月: 正常'],
        ['color' => 'warning', 'tooltip' => '3月: 部分故障'],
        ['color' => 'success', 'tooltip' => '4月: 正常'],
        ['color' => 'success', 'tooltip' => '5月: 正常'],
        ['color' => 'danger', 'tooltip' => '6月: 重大故障'],
        ['color' => 'success', 'tooltip' => '7月: 正常'],
        ['color' => 'success', 'tooltip' => '8月: 正常'],
        ['color' => 'success', 'tooltip' => '9月: 正常'],
        ['color' => 'success', 'tooltip' => '10月: 正常'],
        ['color' => 'success', 'tooltip' => '11月: 正常'],
        ['color' => 'success', 'tooltip' => '12月: 正常'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 追踪块数组 |
| `options` | array | [] | 容器的 HTML 属性 |

## items 数组格式

每个 item 可以包含：
```php
[
    'color' => 'success',        // 必需，背景颜色（success/warning/danger/info/primary/secondary）
    'tooltip' => '提示文字',      // 可选，鼠标悬停时的提示
    'options' => [],             // 可选，该块的额外 HTML 属性
]
```

## 可用颜色

- `success` - 绿色（成功/正常）
- `warning` - 黄色（警告/进行中）
- `danger` - 红色（错误/故障）
- `info` - 蓝色（信息）
- `primary` - 主色
- `secondary` - 灰色（次要/待处理）
