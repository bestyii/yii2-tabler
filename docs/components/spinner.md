---
title: Spinner 加载中
description: 加载指示器用于显示加载状态
keywords: [spinner, 加载, loading]
related: [Progress, Skeleton]
---

加载指示器用于显示加载或处理中的状态。

## 边框样式
```php-demo
use bestyii\tabler\Spinner;

echo Spinner::widget(['type' => 'border', 'color' => 'primary']);
echo Spinner::widget(['type' => 'border', 'color' => 'secondary']);
echo Spinner::widget(['type' => 'border', 'color' => 'success']);
echo Spinner::widget(['type' => 'border', 'color' => 'danger']);
```

## 增长样式
```php-demo
use bestyii\tabler\Spinner;

echo Spinner::widget(['type' => 'grow', 'color' => 'primary']);
echo Spinner::widget(['type' => 'grow', 'color' => 'success']);
echo Spinner::widget(['type' => 'grow', 'color' => 'warning']);
echo Spinner::widget(['type' => 'grow', 'color' => 'danger']);
```

## 不同尺寸
```php-demo
use bestyii\tabler\Spinner;

echo Spinner::widget(['type' => 'border', 'size' => 'sm']);
echo Spinner::widget(['type' => 'border']);
echo Spinner::widget(['type' => 'grow', 'size' => 'sm']);
echo Spinner::widget(['type' => 'grow']);
```

## 点状样式
```php-demo
use bestyii\tabler\Spinner;

echo Spinner::widget(['type' => 'dots']);
```

## 居中显示
```php-demo
use bestyii\tabler\Spinner;

echo Spinner::widget(['type' => 'border', 'color' => 'primary', 'centered' => true]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `type` | string | 'border' | 类型: border/grow/dots |
| `color` | string | - | 颜色 |
| `size` | string | - | 尺寸: sm |
| `centered` | bool | false | 是否居中 |
