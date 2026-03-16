---
title: Datagrid 数据网格
description: 数据网格用于以键值对形式展示数据项
keywords: [datagrid, 数据, 网格, grid]
related: [Card, Divider]
---

Datagrid 用于以整洁的键值对形式展示数据，常用于卡片内部显示详情信息。

## 基础用法
```php-demo
use bestyii\tabler\Datagrid;

echo Datagrid::widget([
    'items' => [
        ['title' => '域名', 'value' => 'example.com'],
        ['title' => 'IP 地址', 'value' => '192.168.1.1'],
        ['title' => '状态', 'value' => '<span class="badge bg-success">运行中</span>'],
        ['title' => '创建时间', 'value' => '2024-01-15'],
    ],
]);
```

## 在卡片中使用
```php-demo
use bestyii\tabler\Card;
use bestyii\tabler\Datagrid;

echo Card::widget([
    'title' => '服务器信息',
    'content' => Datagrid::widget([
        'items' => [
            ['title' => '主机名', 'value' => 'web-server-01'],
            ['title' => '操作系统', 'value' => 'Ubuntu 22.04'],
            ['title' => 'CPU', 'value' => '4 核'],
            ['title' => '内存', 'value' => '8 GB'],
            ['title' => '磁盘', 'value' => '100 GB SSD'],
        ],
    ]),
]);
```

## 响应式布局
```php-demo
use bestyii\tabler\Datagrid;

echo Datagrid::widget([
    'options' => ['class' => 'datagrid-bordered'],
    'items' => [
        ['title' => '客户名称', 'value' => '张三'],
        ['title' => '联系电话', 'value' => '138-0000-0000'],
        ['title' => '电子邮箱', 'value' => 'zhangsan@example.com'],
        ['title' => '地址', 'value' => '北京市朝阳区某某街道'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 数据项列表，每项包含 title 和 value |
| `options` | array | [] | 容器的 HTML 属性 |

## items 数组格式

每个 item 可以包含：
```php
[
    'title' => '标题',
    'value' => '值（支持 HTML）',
    'options' => [],  // 可选，该项的 HTML 属性
]
```
