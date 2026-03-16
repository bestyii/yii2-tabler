---
title: Divider 分隔线
description: 分隔线用于分隔内容区域
keywords: [divider, 分隔线, 分割, 分隔]
related: [Card, Divider]
---

分隔线组件用于分隔内容区域，支持带文本的分隔。

## 基础用法
```php-demo
use bestyii\tabler\Divider;

echo '<p>上方内容</p>';
echo Divider::widget([]);
echo '<p>下方内容</p>';
```

## 带文本
```php-demo
use bestyii\tabler\Divider;

echo Divider::widget(['text' => '或']);
```

## 文本位置
```php-demo
use bestyii\tabler\Divider;

echo '<div class="mb-3">' . Divider::widget(['text' => '左对齐', 'position' => 'left']) . '</div>';
echo '<div class="mb-3">' . Divider::widget(['text' => '居中', 'position' => 'center']) . '</div>';
echo Divider::widget(['text' => '右对齐', 'position' => 'right']);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `text` | string | '' | 分隔线文本 |
| `position` | string | 'center' | 文本位置: left/center/right |
