---
title: Icon 图标
description: 图标组件用于渲染 Tabler 图标
keywords: [icon, 图标, svg]
related: [Badge, Button]
---

图标组件用于渲染 Tabler 图标库中的 SVG 图标。

## 基础用法

```php-demo
use bestyii\tabler\Icon;

echo Icon::widget(['name' => 'home']);
echo Icon::widget(['name' => 'user']);
echo Icon::widget(['name' => 'settings']);
echo Icon::widget(['name' => 'heart']);
```

## 常用图标

```php-demo
use bestyii\tabler\Icon;

$icons = ['home', 'user', 'mail', 'bell', 'search', 'settings', 'star', 'heart'];
foreach ($icons as $icon) {
    echo Icon::widget(['name' => $icon, 'options' => ['style' => 'font-size: 1.5rem; margin: 0.25rem']]);
}
```

## 图标尺寸

通过 CSS 控制图标大小：

```php-demo
use bestyii\tabler\Icon;

echo Icon::widget(['name' => 'star', 'options' => ['style' => 'font-size: 1rem']]);
echo Icon::widget(['name' => 'star', 'options' => ['style' => 'font-size: 1.5rem']]);
echo Icon::widget(['name' => 'star', 'options' => ['style' => 'font-size: 2rem']]);
echo Icon::widget(['name' => 'star', 'options' => ['style' => 'font-size: 3rem']]);
```

## 图标颜色

通过 CSS 控制图标颜色：

```php-demo
use bestyii\tabler\Icon;

echo Icon::widget(['name' => 'heart', 'options' => ['class' => 'text-red', 'style' => 'font-size: 1.5rem']]);
echo Icon::widget(['name' => 'star', 'options' => ['class' => 'text-yellow', 'style' => 'font-size: 1.5rem']]);
echo Icon::widget(['name' => 'check', 'options' => ['class' => 'text-green', 'style' => 'font-size: 1.5rem']]);
echo Icon::widget(['name' => 'info-circle', 'options' => ['class' => 'text-blue', 'style' => 'font-size: 1.5rem']]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `name` | string | - | 图标名称（如 'home', 'user'） |
| `options` | array | [] | HTML 属性 |

## 图标命名

图标名称对应 [Tabler Icons](https://tabler.io/icons) 库：

- 使用时无需前缀 `ti-`，如 `icon-home` 只需写 `home`
- 也支持直接使用 `ti-home` 格式

## 适用场景

- 按钮图标
- 导航图标
- 状态指示
- 装饰元素
