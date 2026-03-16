---
title: Badge 徽章
description: 徽章组件用于标签、状态指示和计数显示
keywords: [badge, 徽章, 标签, 状态]
related: [Status, Tag]
---

徽章是一个小型的计数和标签组件，用于为界面元素添加额外信息。

## 基础用法

默认的徽章样式，支持多种颜色：

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget(['text' => 'Primary', 'color' => 'primary']);
echo Badge::widget(['text' => 'Success', 'color' => 'success']);
echo Badge::widget(['text' => 'Warning', 'color' => 'warning']);
echo Badge::widget(['text' => 'Danger', 'color' => 'danger']);
echo Badge::widget(['text' => 'Info', 'color' => 'info']);
echo Badge::widget(['text' => 'Secondary', 'color' => 'secondary']);
```

## 轮廓样式

使用 `outline` 属性创建轮廓徽章：

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget(['text' => 'Primary', 'color' => 'primary', 'outline' => true]);
echo Badge::widget(['text' => 'Success', 'color' => 'success', 'outline' => true]);
echo Badge::widget(['text' => 'Warning', 'color' => 'warning', 'outline' => true]);
echo Badge::widget(['text' => 'Danger', 'color' => 'danger', 'outline' => true]);
```

## 药丸形状

使用 `pill` 属性创建圆角徽章：

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget(['text' => 'Primary', 'color' => 'primary', 'pill' => true]);
echo Badge::widget(['text' => '2', 'color' => 'danger', 'pill' => true]);
echo Badge::widget(['text' => '99+', 'color' => 'warning', 'pill' => true]);
```

## 带图标

使用 `icon` 属性添加图标：

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget(['text' => ' Star', 'color' => 'warning', 'icon' => 'star']);
echo Badge::widget(['text' => ' Heart', 'color' => 'danger', 'icon' => 'heart']);
echo Badge::widget(['text' => ' Check', 'color' => 'success', 'icon' => 'check']);
```

## 链接徽章

使用 `url` 属性创建可点击的链接徽章：

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget(['text' => 'View', 'color' => 'primary', 'url' => '#']);
echo Badge::widget(['text' => 'Edit', 'color' => 'info', 'url' => '#']);
```

## 轻量样式

使用 `lite` 属性创建浅色背景的徽章：

```php-demo
use bestyii\tabler\Badge;

echo Badge::widget(['text' => 'Primary', 'color' => 'primary', 'lite' => true]);
echo Badge::widget(['text' => 'Success', 'color' => 'success', 'lite' => true]);
echo Badge::widget(['text' => 'Warning', 'color' => 'warning', 'lite' => true]);
echo Badge::widget(['text' => 'Danger', 'color' => 'danger', 'lite' => true]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `text` | string | - | 徽章文本内容 |
| `color` | string | - | 颜色: primary/success/warning/danger/info/secondary |
| `outline` | bool | false | 是否为轮廓样式 |
| `pill` | bool | false | 是否为药丸形状（圆角） |
| `lite` | bool | false | 是否为轻量样式（浅色背景） |
| `icon` | string | - | 图标名称 |
| `url` | string | - | 链接地址，设置后渲染为 `<a>` 标签 |
| `options` | array | [] | HTML 属性 |

## 适用场景

- 状态标签显示
- 分类标记
- 数量提示（如未读消息数）
- 新功能标识
