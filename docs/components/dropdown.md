---
title: Dropdown 下拉菜单
description: 下拉菜单用于显示可点击的选项列表，提升用户交互体验
keywords: [dropdown, 下拉菜单, 选项]
related: [Button, Offcanvas, Card]
---

下拉菜单是一个灵活的组件，可以在不占用过多空间的情况下显示更多选项。

## 基础用法

使用 Button 组件的 `dropdown` 属性快速创建下拉触发按钮：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '操作', 'url' => '#'],
    ['label' => '另一个操作', 'url' => '#'],
    ['label' => '其他操作', 'url' => '#'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '打开菜单',
    'color' => 'primary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';
```

## 带分隔线

使用 `'-'` 作为分隔线，将菜单项分组：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '编辑', 'url' => '#'],
    ['label' => '复制', 'url' => '#'],
    '-', // 分隔线
    ['label' => '删除', 'url' => '#'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '操作',
    'color' => 'secondary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';
```

## 激活状态

使用 `active` 属性标记当前选项：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '选项一', 'url' => '#'],
    ['label' => '选项二', 'url' => '#', 'active' => true],
    ['label' => '选项三', 'url' => '#'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '激活状态',
    'color' => 'primary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';
```

## 带标题

使用 `type => 'header'` 添加分组标题：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['type' => 'header', 'label' => '常用操作'],
    ['label' => '编辑', 'url' => '#'],
    ['label' => '复制', 'url' => '#'],
    '-',
    ['type' => 'header', 'label' => '危险操作'],
    ['label' => '删除', 'url' => '#'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '带标题',
    'color' => 'primary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';
```

## 带图标

使用 `icon` 属性为菜单项添加图标：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '设置', 'url' => '#', 'icon' => 'settings'],
    ['label' => '编辑', 'url' => '#', 'icon' => 'edit'],
    ['label' => '复制', 'url' => '#', 'icon' => 'copy'],
    '-',
    ['label' => '删除', 'url' => '#', 'icon' => 'trash'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '带图标',
    'color' => 'primary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';
```

## 带箭头

Dropdown 默认启用箭头（`arrow => true`），箭头指向触发按钮：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '操作', 'url' => '#'],
    ['label' => '另一个操作', 'url' => '#'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '带箭头',
    'color' => 'primary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items, 'arrow' => true]);
echo '</div>';
```

## 对齐方式

使用 `align` 属性控制菜单对齐方向：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '选项 1', 'url' => '#'],
    ['label' => '选项 2', 'url' => '#'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '左对齐',
    'color' => 'secondary',
    'outline' => true,
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items, 'align' => 'start']);
echo '</div>';

echo ' ';

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '右对齐',
    'color' => 'secondary',
    'outline' => true,
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items, 'align' => 'end']);
echo '</div>';
```

## 卡片样式

使用 `card => true` 将下拉菜单设置为卡片样式，适合展示更丰富的内容：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '查看详情', 'url' => '#'],
    ['label' => '编辑信息', 'url' => '#'],
    '-',
    ['label' => '删除', 'url' => '#'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '卡片样式',
    'color' => 'primary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items, 'card' => true]);
echo '</div>';
```

## 嵌套子菜单

Dropdown 支持嵌套子菜单，使用 `items` 属性定义子项：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '编辑', 'url' => '#', 'icon' => 'edit'],
    ['label' => '复制', 'url' => '#', 'icon' => 'copy'],
    [
        'label' => '更多操作',
        'url' => '#',
        'icon' => 'dots',
        'items' => [
            ['label' => '导出', 'url' => '#'],
            ['label' => '归档', 'url' => '#'],
            ['label' => '分享', 'url' => '#'],
        ],
    ],
    '-',
    ['label' => '删除', 'url' => '#', 'icon' => 'trash'],
];

echo '<div class="dropdown d-inline-block">';
echo Button::widget([
    'label' => '嵌套菜单',
    'color' => 'primary',
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';
```

## 不同方向

使用 CSS 类 `dropup`、`dropstart`、`dropend` 改变菜单弹出方向：

```php-demo
use bestyii\tabler\Dropdown;
use bestyii\tabler\Button;

$items = [
    ['label' => '选项 1', 'url' => '#'],
    ['label' => '选项 2', 'url' => '#'],
];

// 向上弹出
echo '<div class="dropup d-inline-block">';
echo Button::widget([
    'label' => '向上弹出',
    'color' => 'secondary',
    'outline' => true,
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';

echo ' ';

// 向右弹出
echo '<div class="dropend d-inline-block">';
echo Button::widget([
    'label' => '向右弹出',
    'color' => 'secondary',
    'outline' => true,
    'dropdown' => true,
]);
echo Dropdown::widget(['items' => $items]);
echo '</div>';
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 菜单项列表 |
| `align` | string | - | 对齐方式: start/end |
| `arrow` | bool | true | 是否显示箭头 |
| `card` | bool | false | 是否为卡片样式 |
| `options` | array | [] | 容器 HTML 属性 |

## items 配置

每个 item 支持以下属性：

| 属性 | 类型 | 说明 |
|------|------|------|
| `label` | string | 显示文本 |
| `url` | string | 链接地址 |
| `icon` | string | 图标名称 |
| `active` | bool | 是否激活状态 |
| `visible` | bool | 是否可见 |
| `type` | string | 'header' 标题，'-' 或忽略则为分隔线 |
| `items` | array | 子菜单（嵌套下拉） |
| `options` | array | 菜单项容器 HTML 属性 |
| `linkOptions` | array | 链接 HTML 属性 |

## Button dropdown 属性

配合 Dropdown 使用时，Button 组件支持：

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `dropdown` | bool | false | 自动添加 dropdown-toggle 和 data 属性 |
