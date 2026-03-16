---
title: Nav 导航
description: 导航组件用于创建响应式的导航菜单
keywords: [nav, navigation, 导航, 菜单, navbar]
related: [Dropdown, Icon, Tabs]
---

Nav 组件用于创建导航菜单，支持图标、下拉菜单等功能，常用于顶部导航栏或侧边菜单。

## 基础用法
```php-demo
use bestyii\tabler\Nav;

echo Nav::widget([
    'items' => [
        ['label' => '首页', 'url' => '#'],
        ['label' => '产品', 'url' => '#'],
        ['label' => '关于', 'url' => '#'],
        ['label' => '联系', 'url' => '#'],
    ],
]);
```

## 带图标
```php-demo
use bestyii\tabler\Nav;

echo Nav::widget([
    'items' => [
        ['label' => '首页', 'url' => '#', 'icon' => 'home'],
        ['label' => '用户', 'url' => '#', 'icon' => 'users'],
        ['label' => '设置', 'url' => '#', 'icon' => 'settings'],
        ['label' => '帮助', 'url' => '#', 'icon' => 'help-circle'],
    ],
]);
```

## 带下拉菜单
```php-demo
use bestyii\tabler\Nav;

echo Nav::widget([
    'items' => [
        ['label' => '首页', 'url' => '#'],
        [
            'label' => '产品',
            'url' => '#',
            'items' => [
                ['label' => '产品 A', 'url' => '#'],
                ['label' => '产品 B', 'url' => '#'],
            ],
        ],
        [
            'label' => '服务',
            'url' => '#',
            'items' => [
                ['label' => '咨询', 'url' => '#'],
                ['label' => '开发', 'url' => '#'],
                ['label' => '运维', 'url' => '#'],
            ],
        ],
        ['label' => '联系', 'url' => '#'],
    ],
]);
```

## 高亮当前项
```php-demo
use bestyii\tabler\Nav;

echo Nav::widget([
    'items' => [
        ['label' => '仪表盘', 'url' => '#', 'active' => true],
        ['label' => '订单', 'url' => '#'],
        ['label' => '客户', 'url' => '#'],
        ['label' => '报表', 'url' => '#'],
    ],
]);
```

## 导航栏样式
```php-demo
use bestyii\tabler\Nav;

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2 rounded">';
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => '首页', 'url' => '#', 'icon' => 'home', 'active' => true],
        ['label' => '功能', 'url' => '#', 'icon' => 'grid'],
        ['label' => '定价', 'url' => '#', 'icon' => 'currency-dollar'],
        ['label' => '关于', 'url' => '#', 'icon' => 'info-circle'],
    ],
]);
echo '</nav>';
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 导航项列表 |
| `options` | array | ['class' => 'navbar-nav'] | 容器的 HTML 属性 |
| `dropdownClass` | string | '\bestyii\tabler\Dropdown' | 下拉菜单类名 |
| `encodeLabels` | bool | false | 是否编码标签（设为 false 支持 HTML） |

## items 数组格式

每个 item 可以包含：
```php
[
    'label' => '显示文本',      // 必需
    'url' => '/path',           // 可选，链接地址
    'icon' => 'icon-name',      // 可选，Tabler 图标名
    'active' => true,           // 可选，是否高亮
    'visible' => true,          // 可选，是否显示
    'items' => [...],           // 可选，下拉子菜单
    'options' => [],            // 可选，该项的 HTML 属性
    'linkOptions' => [],        // 可选，链接的 HTML 属性
]
```
