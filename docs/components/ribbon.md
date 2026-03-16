---
title: Ribbon 角标
description: 角标用于在元素上显示标签或促销信息
keywords: [ribbon, 角标, 标签]
related: [Card, Badge]
---

角标组件用于在卡片或其他元素上显示标签或促销信息。

## 基础用法

```php-demo
use bestyii\tabler\Ribbon;

echo '<div class="position-absolute m-3">' . Ribbon::widget(['text' => 'NEW', 'color' => 'primary']) . '</div>';
```

## 不同颜色

```php-demo
use bestyii\tabler\Ribbon;

echo '<div class="position-absolute m-2">' . Ribbon::widget(['text' => 'HOT', 'color' => 'danger']) . '</div>';
```

## 不同位置

```php-demo
use bestyii\tabler\Ribbon;

echo '<div class="position-absolute m-3">' . Ribbon::widget(['text' => 'TOP', 'color' => 'warning', 'position' => 'top']) . '</div>';
```

## 在卡片中使用

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '产品标题',
    'ribbon' => ['text' => '热销', 'color' => 'red']
]);
echo '<p class="text-muted mb-0">这是一个带有角标的卡片。</p>';
Card::end();
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `text` | string | - | 角标文本 |
| `color` | string | - | 颜色 |
| `position` | string | 'top' | 位置: top/bottom/left/right/bookmark |
