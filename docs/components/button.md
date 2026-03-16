---
title: Button 按钮
description: 按钮组件用于触发操作和提交表单
keywords: [button, 按钮, 操作]
related: [Badge, Alert]
---

按钮是触发操作和提交表单的核心组件。

## 基础用法

支持多种颜色的按钮：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => 'Primary', 'color' => 'primary']);
echo Button::widget(['label' => 'Secondary', 'color' => 'secondary']);
echo Button::widget(['label' => 'Success', 'color' => 'success']);
echo Button::widget(['label' => 'Warning', 'color' => 'warning']);
echo Button::widget(['label' => 'Danger', 'color' => 'danger']);
echo Button::widget(['label' => 'Info', 'color' => 'info']);
```

## 轮廓按钮

使用 `outline` 属性创建轮廓样式：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => 'Primary', 'color' => 'primary', 'outline' => true]);
echo Button::widget(['label' => 'Success', 'color' => 'success', 'outline' => true]);
echo Button::widget(['label' => 'Danger', 'color' => 'danger', 'outline' => true]);
```

## 幽灵按钮

使用 `ghost` 属性创建幽灵样式：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => 'Primary', 'color' => 'primary', 'ghost' => true]);
echo Button::widget(['label' => 'Success', 'color' => 'success', 'ghost' => true]);
echo Button::widget(['label' => 'Danger', 'color' => 'danger', 'ghost' => true]);
```

## 按钮尺寸

使用 `size` 属性调整按钮大小：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => 'Small', 'color' => 'primary', 'size' => 'sm']);
echo Button::widget(['label' => 'Default', 'color' => 'primary']);
echo Button::widget(['label' => 'Large', 'color' => 'primary', 'size' => 'lg']);
```

## 带图标

使用 `icon` 属性添加图标：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => '下载', 'color' => 'primary', 'icon' => 'download']);
echo Button::widget(['label' => '上传', 'color' => 'success', 'icon' => 'upload']);
echo Button::widget(['label' => '删除', 'color' => 'danger', 'icon' => 'trash']);
```

## 纯图标按钮

使用 `variant` 属性设为 `icon` 创建图标按钮：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['icon' => 'plus', 'color' => 'primary', 'variant' => 'icon']);
echo Button::widget(['icon' => 'edit', 'color' => 'info', 'variant' => 'icon']);
echo Button::widget(['icon' => 'trash', 'color' => 'danger', 'variant' => 'icon']);
```

## 药丸按钮

使用 `pill` 属性创建圆角按钮：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => 'Primary', 'color' => 'primary', 'pill' => true]);
echo Button::widget(['label' => 'Success', 'color' => 'success', 'pill' => true]);
```

## 方形按钮

使用 `square` 属性创建方形按钮：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => 'A', 'color' => 'primary', 'square' => true]);
echo Button::widget(['label' => 'B', 'color' => 'secondary', 'square' => true]);
echo Button::widget(['icon' => 'plus', 'color' => 'success', 'variant' => 'icon', 'square' => true]);
```

## 链接按钮

使用 `url` 属性将按钮渲染为链接：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => '访问首页', 'color' => 'primary', 'url' => '/']);
echo Button::widget(['label' => '了解更多', 'color' => 'info', 'outline' => true, 'url' => '#']);
```

## 加载状态

使用 `loading` 属性显示加载状态：

```php-demo
use bestyii\tabler\Button;

echo Button::widget(['label' => '提交中...', 'color' => 'primary', 'loading' => true]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `label` | string | - | 按钮文本 |
| `color` | string | - | 颜色: primary/secondary/success/warning/danger/info |
| `icon` | string | - | 图标名称 |
| `size` | string | - | 尺寸: sm/lg |
| `outline` | bool | false | 是否为轮廓样式 |
| `ghost` | bool | false | 是否为幽灵样式 |
| `pill` | bool | false | 是否为药丸形状 |
| `square` | bool | false | 是否为方形 |
| `variant` | string | - | 变体: icon/lite |
| `url` | string | - | 链接地址 |
| `loading` | bool | false | 是否显示加载状态 |
| `social` | string | - | 社交按钮: facebook/twitter/google 等 |
| `options` | array | [] | HTML 属性 |

## 适用场景

- 表单提交
- 页面操作
- 导航链接
- 触发弹窗
