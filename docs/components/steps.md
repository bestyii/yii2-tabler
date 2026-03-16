---
title: Steps 步骤条
description: 步骤条用于显示多步骤流程的进度
keywords: [steps, 步骤, 流程, 向导]
related: [Tabs, Timeline]
---

步骤条组件用于显示多步骤流程的进度。

## 基础用法
```php-demo
use bestyii\tabler\Steps;

echo Steps::widget([
    'items' => [
        ['title' => '选择', 'active' => true],
        ['title' => '配置'],
        ['title' => '完成'],
    ],
]);
```

## 指定当前步骤
```php-demo
use bestyii\tabler\Steps;

echo Steps::widget([
    'items' => [
        ['title' => '步骤 1', 'active' => true],
        ['title' => '步骤 2', 'active' => true],
        ['title' => '步骤 3'],
    ],
]);
```

## 带副标题
```php-demo
use bestyii\tabler\Steps;

echo Steps::widget([
    'items' => [
        ['title' => '基本信息', 'subtitle' => '1/3', 'active' => true],
        ['title' => '联系方式', 'subtitle' => '2/3'],
        ['title' => '确认提交', 'subtitle' => '3/3'],
    ],
]);
```

## 计数器样式
```php-demo
use bestyii\tabler\Steps;

echo Steps::widget([
    'type' => 'counter',
    'items' => [
        ['title' => '第一步', 'active' => true],
        ['title' => '第二步', 'active' => true],
        ['title' => '第三步'],
    ],
]);
```

## 不同颜色
```php-demo
use bestyii\tabler\Steps;

echo Steps::widget([
    'color' => 'success',
    'items' => [
        ['title' => '已完成', 'active' => true],
        ['title' => '进行中', 'active' => true],
        ['title' => '待完成'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 步骤列表 |
| `type` | string | 'color' | 类型: color/counter |
| `color` | string | - | 整体颜色 |

## items 配置

每个 item 支持以下属性：

| 属性 | 类型 | 说明 |
|------|------|------|
| `title` | string | 步骤标题 |
| `subtitle` | string | 副标题 |
| `active` | bool | 是否已完成/激活 |
| `url` | string | 链接地址 |
