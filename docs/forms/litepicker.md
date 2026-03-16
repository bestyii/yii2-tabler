---
title: Litepicker 日期选择
description: 轻量级日期范围选择器
keywords: [date, 日期, 日期选择, 日历]
related: [ActiveForm, TomSelect]
---

Litepicker 是一个轻量级的日期选择器，支持单日期和日期范围选择。

## 基础用法
```php-demo
use bestyii\tabler\Litepicker;

echo Litepicker::widget([
    'name' => 'date',
    'value' => date('Y-m-d'),
]);
```

## 在表单中使用
```php-demo
use bestyii\tabler\ActiveForm;
use bestyii\tabler\Litepicker;

$form = ActiveForm::begin();
echo $form->field($model, 'published_at')->widget(Litepicker::class, [
    'pluginOptions' => [
        'format' => 'YYYY-MM-DD',
        'singleMode' => true,
    ]
]);
ActiveForm::end();
```

## 日期范围选择
```php-demo
use bestyii\tabler\Litepicker;

echo Litepicker::widget([
    'name' => 'date_range',
    'pluginOptions' => [
        'format' => 'YYYY-MM-DD',
        'singleMode' => false,
        'startDate' => date('Y-m-01'),
        'endDate' => date('Y-m-t'),
    ],
]);
```

## 限制日期范围
```php-demo
use bestyii\tabler\Litepicker;

echo Litepicker::widget([
    'name' => 'booking_date',
    'pluginOptions' => [
        'format' => 'YYYY-MM-DD',
        'singleMode' => true,
        'minDate' => date('Y-m-d'),
        'maxDate' => date('Y-m-d', strtotime('+30 days')),
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `pluginOptions` | array | [] | 插件配置，详见 https://litepicker.com/docs/options |

## pluginOptions 常用配置

| 选项 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `format` | string | 'D MMM, YYYY' | 日期格式 |
| `singleMode` | bool | true | 是否为单日期模式 |
| `numberOfMonths` | int | 1 | 显示的月份数 |
| `numberOfColumns` | int | 1 | 显示的列数 |
| `startDate` | string | - | 开始日期 |
| `endDate` | string | - | 结束日期 |
| `minDate` | string | null | 最小可选日期 |
| `maxDate` | string | null | 最大可选日期 |
