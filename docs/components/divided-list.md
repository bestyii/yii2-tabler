---
title: DividedList 分隔列表
description: 分隔列表用于渲染带分隔线的列表项
keywords: [list, divided, 列表, 分隔]
related: [Card, Divider]
---

DividedList 渲染一组带分隔线的列表项，常用于卡片内部展示项目列表。

## 基础用法
```php-demo
use bestyii\tabler\DividedList;

echo DividedList::widget([
    'items' => [
        '项目一：系统配置',
        '项目二：用户管理',
        '项目三：权限设置',
        '项目四：日志查看',
    ],
]);
```

## 在卡片中使用
```php-demo
use bestyii\tabler\Card;
use bestyii\tabler\DividedList;

echo Card::widget([
    'title' => '快速操作',
    'content' => DividedList::widget([
        'items' => [
            '<a href="#">添加新用户</a>',
            '<a href="#">导出数据</a>',
            '<a href="#">系统设置</a>',
            '<a href="#">查看日志</a>',
        ],
    ]),
]);
```

## 带图标的列表项
```php-demo
use bestyii\tabler\DividedList;
use bestyii\tabler\Icon;

echo DividedList::widget([
    'items' => [
        '<div class="d-flex align-items-center">' . Icon::widget(['name' => 'user']) . '<span class="ms-2">个人资料</span></div>',
        '<div class="d-flex align-items-center">' . Icon::widget(['name' => 'lock']) . '<span class="ms-2">安全设置</span></div>',
        '<div class="d-flex align-items-center">' . Icon::widget(['name' => 'bell']) . '<span class="ms-2">通知偏好</span></div>',
        '<div class="d-flex align-items-center">' . Icon::widget(['name' => 'palette']) . '<span class="ms-2">主题设置</span></div>',
    ],
]);
```

## 水平分隔线
```php-demo
use bestyii\tabler\DividedList;

echo DividedList::widget([
    'dividerClass' => 'divide-x',
    'options' => ['class' => 'd-flex'],
    'items' => [
        ['content' => '<div class="px-3">首页</div>'],
        ['content' => '<div class="px-3">产品</div>'],
        ['content' => '<div class="px-3">关于</div>'],
        ['content' => '<div class="px-3">联系</div>'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 列表项数组 |
| `options` | array | [] | 容器的 HTML 属性 |
| `dividerClass` | string | 'divide-y' | 分隔线 CSS 类，可选 'divide-y', 'divide-x' 等 |

## items 数组格式

每个 item 可以是：
- 字符串：直接渲染 HTML
- 数组：包含 `content` 和 `options`

```php
// 简单字符串
'项目内容'

// 数组格式
[
    'content' => '项目内容',
    'options' => ['class' => 'py-2'],  // 可选，该项的 HTML 属性
]
```
