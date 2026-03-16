---
title: Skeleton 骨架屏
description: 骨架屏用于内容加载时的占位显示
keywords: [skeleton, 骨架屏, 占位, loading]
related: [Spinner, Status]
---

骨架屏在内容加载时显示占位符，提升用户体验。

## 文本占位
```php-demo
use bestyii\tabler\Skeleton;

echo '<div class="w-50">' .
    Skeleton::widget(['type' => 'line']) .
    Skeleton::widget(['type' => 'line', 'width' => '8']) .
    Skeleton::widget(['type' => 'line', 'width' => '6']) .
    '</div>';
```

## 头像占位
```php-demo
use bestyii\tabler\Skeleton;

echo Skeleton::widget(['type' => 'avatar', 'size' => 'sm']);
echo Skeleton::widget(['type' => 'avatar']);
echo Skeleton::widget(['type' => 'avatar', 'size' => 'lg']);
```

## 图片占位
```php-demo
use bestyii\tabler\Skeleton;

echo Skeleton::widget(['type' => 'image']);
```

## 不同动画
```php-demo
use bestyii\tabler\Skeleton;

echo '<div class="col-6">' . Skeleton::widget(['type' => 'line', 'animation' => 'glow']) . '</div>';
echo '<div class="col-6">' . Skeleton::widget(['type' => 'line', 'animation' => 'wave']) . '</div>';
```

## 组合使用
```php-demo
use bestyii\tabler\Skeleton;

echo '<div class="d-flex align-items-center gap-3">
    ' . Skeleton::widget(['type' => 'avatar']) . '
    <div>
        <div class="mb-2">' . Skeleton::widget(['type' => 'line', 'width' => '4']) . '</div>
        <div>' . Skeleton::widget(['type' => 'line', 'width' => '3']) . '</div>
    </div>
</div>';
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `type` | string | 'line' | 类型: line/avatar/image |
| `size` | string | - | 尺寸: xs/sm/lg |
| `width` | string | - | 宽度: 1-12 或 col-* 格式 |
| `animation` | string | 'glow' | 动画: glow/wave/false |
