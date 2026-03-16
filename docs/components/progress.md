---
title: Progress 进度条
description: 进度条用于显示任务完成进度
keywords: [progress, 进度条, 进度]
related: [Spinner, Skeleton]
---

进度条组件用于显示任务的完成进度。

## 基础用法
```php-demo
use bestyii\tabler\Progress;

echo Progress::widget(['percent' => 25]);
echo Progress::widget(['percent' => 50, 'color' => 'success']);
echo Progress::widget(['percent' => 75, 'color' => 'warning']);
echo Progress::widget(['percent' => 100, 'color' => 'danger']);
```

## 带标签
```php-demo
use bestyii\tabler\Progress;

echo Progress::widget(['percent' => 65, 'label' => '65%']);
```

## 条纹动画
```php-demo
use bestyii\tabler\Progress;

echo Progress::widget(['percent' => 45, 'striped' => true]);
echo Progress::widget(['percent' => 60, 'striped' => true, 'animated' => true]);
```

## 不确定进度
```php-demo
use bestyii\tabler\Progress;

echo Progress::widget(['indeterminate' => true, 'color' => 'primary']);
```

## 不同尺寸
```php-demo
use bestyii\tabler\Progress;

echo Progress::widget(['percent' => 50, 'size' => 'sm']);
echo Progress::widget(['percent' => 50]);
echo Progress::widget(['percent' => 50, 'size' => 'lg']);
```

## 多进度条
```php-demo
use bestyii\tabler\Progress;

echo Progress::widget([
    'separated' => true,
    'bars' => [
        ['percent' => 35, 'color' => 'primary', 'label' => '35%'],
        ['percent' => 20, 'color' => 'success', 'label' => '20%'],
        ['percent' => 15, 'color' => 'warning', 'label' => '15%'],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `percent` | float | 0 | 进度百分比 (0-100) |
| `value` | float | - | 同 percent |
| `label` | string | - | 标签文本 |
| `color` | string | 'primary' | 颜色 |
| `size` | string | - | 尺寸: sm/lg |
| `striped` | bool | false | 是否条纹 |
| `animated` | bool | false | 是否动画 |
| `indeterminate` | bool | false | 是否不确定进度 |
| `separated` | bool | false | 多进度条时是否分隔 |
| `bars` | array | [] | 多进度条配置 |
