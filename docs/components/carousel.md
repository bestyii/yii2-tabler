---
title: Carousel 轮播图
description: 轮播图用于展示一组可滑动的内容
keywords: [carousel, slider, 轮播, slide]
related: [Card, Modal]
---

Carousel 用于创建可滑动的内容展示，常用于图片展示或内容轮播。

## 基础用法
```php-demo
use bestyii\tabler\Carousel;

echo Carousel::widget([
    'items' => [
        ['content' => '<div class="bg-blue text-white p-5 text-center h-300 d-flex align-items-center justify-content-center"><h2>幻灯片 1</h2></div>'],
        ['content' => '<div class="bg-azure text-white p-5 text-center h-300 d-flex align-items-center justify-content-center"><h2>幻灯片 2</h2></div>'],
        ['content' => '<div class="bg-indigo text-white p-5 text-center h-300 d-flex align-items-center justify-content-center"><h2>幻灯片 3</h2></div>'],
    ],
]);
```

## 带标题
```php-demo
use bestyii\tabler\Carousel;

echo Carousel::widget([
    'items' => [
        [
            'content' => '<div class="bg-success text-white p-5 text-center h-250 d-flex align-items-center justify-content-center"><h1>欢迎</h1></div>',
            'caption' => '<h3>欢迎</h3><p>这是第一个幻灯片的说明文字</p>',
        ],
        [
            'content' => '<div class="bg-warning text-white p-5 text-center h-250 d-flex align-items-center justify-content-center"><h1>功能</h1></div>',
            'caption' => '<h3>功能介绍</h3><p>探索我们强大的功能</p>',
        ],
        [
            'content' => '<div class="bg-danger text-white p-5 text-center h-250 d-flex align-items-center justify-content-center"><h1>开始</h1></div>',
            'caption' => '<h3>立即开始</h3><p>现在就加入我们</p>',
        ],
    ],
]);
```

## 淡入淡出
```php-demo
use bestyii\tabler\Carousel;

echo Carousel::widget([
    'crossfade' => true,
    'items' => [
        ['content' => '<div class="bg-purple text-white p-5 text-center h-200 d-flex align-items-center justify-content-center"><h3>淡入效果 A</h3></div>'],
        ['content' => '<div class="bg-pink text-white p-5 text-center h-200 d-flex align-items-center justify-content-center"><h3>淡入效果 B</h3></div>'],
    ],
]);
```

## 隐藏控制按钮
```php-demo
use bestyii\tabler\Carousel;

echo Carousel::widget([
    'showControls' => false,
    'showIndicators' => true,
    'items' => [
        ['content' => '<div class="bg-teal text-white p-4 text-center h-150 d-flex align-items-center justify-content-center"><h4>只有指示器</h4></div>'],
        ['content' => '<div class="bg-cyan text-white p-4 text-center h-150 d-flex align-items-center justify-content-center"><h4>没有控制按钮</h4></div>'],
        ['content' => '<div class="bg-lime text-white p-4 text-center h-150 d-flex align-items-center justify-content-center"><h4>自动播放</h4></div>'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 幻灯片数组 |
| `showIndicators` | bool | true | 是否显示指示器（小圆点） |
| `showControls` | bool | true | 是否显示控制按钮（左右箭头） |
| `crossfade` | bool | false | 是否使用淡入淡出效果 |
| `options` | array | ['class' => 'carousel slide', 'data-bs-ride' => 'carousel'] | 容器 HTML 属性 |
| `innerOptions` | array | ['class' => 'carousel-inner'] | 内部容器属性 |
| `indicatorOptions` | array | ['class' => 'carousel-indicators'] | 指示器容器属性 |

## items 数组格式

每个 item 可以包含：
```php
[
    'content' => '<div>幻灯片内容</div>',  // 必需
    'caption' => '<h3>标题</h3><p>描述</p>',  // 可选，标题
    'options' => [],                          // 可选，该项 HTML 属性
    'indicatorOptions' => [],                 // 可选，指示器 HTML 属性
]
```
