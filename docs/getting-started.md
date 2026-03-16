---
title: 快速开始
description: Yii2 Tabler 组件库的安装和基本使用
---

## 安装

通过 Composer 安装：

```bash
composer require bestyii/yii2-tabler
```

## 配置

### 1. 注册模块（可选，用于预览）

如果需要查看组件预览，在应用配置中注册模块：

```php
// config/web.php
'modules' => [
    'tabler' => [
        'class' => 'bestyii\tabler\Module',
    ],
],
```

### 2. 使用布局

在控制器中指定 Tabler 布局：

```php
public $layout = '@bestyii/tabler/views/layouts/main';
```

认证页面（登录/注册）使用：

```php
public $layout = '@bestyii/tabler/views/layouts/auth';
```

## 基本用法

### 引入组件

```php
use bestyii\tabler\Badge;
use bestyii\tabler\Card;
use bestyii\tabler\Alert;
```

### 使用 Widget

```php
// 简单 widget
echo Badge::widget([
    'text' => 'New',
    'color' => 'primary',
]);

// 容器型 widget
Card::begin([
    'title' => '卡片标题',
]);
echo '卡片内容';
Card::end();
```

### 表单中使用

```php
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();

echo $form->field($model, 'username', [
    'iconPrepend' => 'user'
])->textInput();

echo $form->field($model, 'email', [
    'iconPrepend' => 'mail'
])->textInput(['type' => 'email']);

ActiveForm::end();
```

## 通用属性

### 颜色 (color)

大多数组件支持以下颜色值：

- `primary` - 主要（蓝色）
- `secondary` - 次要（灰色）
- `success` - 成功（绿色）
- `warning` - 警告（黄色）
- `danger` - 危险（红色）
- `info` - 信息（青色）

### 尺寸 (size)

部分组件支持尺寸：

- `sm` - 小
- `md` - 中（默认）
- `lg` - 大

## 下一步

- 查看 [Badge 徽章](components/badge.md)
- 查看 [Card 卡片](components/card.md)
- 查看 [Alert 警告](components/alert.md)
- 查看 [Button 按钮](components/button.md)
