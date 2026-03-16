---
title: Avatar 头像
description: 头像组件用于显示用户头像或占位符
keywords: [avatar, 头像, 用户图像]
related: [AvatarList, Badge]
---

头像组件用于显示用户头像、姓名首字母或图标。

## 基础用法

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget(['initials' => 'AB']);
echo Avatar::widget(['initials' => 'CD', 'color' => 'success']);
echo Avatar::widget(['initials' => 'EF', 'color' => 'danger']);
```

## 带图片

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget(['url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop']);
echo Avatar::widget(['src' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop']); // src 是 url 的别名
```

## 不同尺寸

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget(['initials' => 'XS', 'size' => 'xs']);
echo Avatar::widget(['initials' => 'SM', 'size' => 'sm']);
echo Avatar::widget(['initials' => 'MD', 'size' => 'md']);
echo Avatar::widget(['initials' => 'LG', 'size' => 'lg']);
echo Avatar::widget(['initials' => 'XL', 'size' => 'xl']);
```

## 圆形和圆角

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget(['initials' => 'AB', 'color' => 'primary']);
echo Avatar::widget(['initials' => 'AB', 'color' => 'primary', 'shape' => 'circle']);
```

## 带图标

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget(['icon' => 'user', 'color' => 'primary']);
echo Avatar::widget(['icon' => 'user', 'color' => 'success']);
```

## 带状态点

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget(['initials' => 'AB', 'status' => 'success']);
echo Avatar::widget(['initials' => 'CD', 'status' => 'danger']);
```

## 堆叠模式

用于在列表中显示多个重叠头像：

```php-demo
use bestyii\tabler\Avatar;

echo Avatar::widget(['initials' => 'A', 'color' => 'primary', 'stacked' => true]);
echo Avatar::widget(['initials' => 'B', 'color' => 'success', 'stacked' => true]);
echo Avatar::widget(['initials' => 'C', 'color' => 'warning', 'stacked' => true]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `url` / `src` | string | - | 图片 URL |
| `initials` / `text` | string | - | 姓名首字母 |
| `icon` | string | - | 图标名称 |
| `size` | string | - | 尺寸: xs/sm/md/lg/xl |
| `shape` | string | - | 形状: circle/rounded |
| `color` | string | - | 背景颜色 |
| `lite` | bool | true | 是否使用浅色背景 |
| `status` | string | - | 状态点颜色 |
| `stacked` | bool | false | 是否为堆叠模式 |
