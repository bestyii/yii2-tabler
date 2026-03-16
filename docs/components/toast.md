---
title: Toast 消息提示
description: Toast 是轻量级的消息提示组件，keywords: [toast, 消息, 提示, 通知]
related: [Alert, Modal]
---

Toast 是轻量级的消息提示组件，通常用于显示简短的反馈信息。

## 基础用法

```php-demo
use bestyii\tabler\Toast;

echo Toast::widget([
    'title' => '通知标题',
    'body' => '这是一条通知消息的内容。',
]);
```

## 带副标题

使用 `subtitle` 显示时间或其他信息：

```php-demo
use bestyii\tabler\Toast;

echo Toast::widget([
    'title' => '新消息',
    'subtitle' => '刚刚',
    'body' => '您收到了一条来自系统的新消息。',
]);
```

## 带图标

使用 `icon` 添加图标：

```php-demo
use bestyii\tabler\Toast;
use bestyii\tabler\Icon;

echo Toast::widget([
    'title' => '成功',
    'body' => '操作已成功完成！',
    'icon' => Icon::widget(['name' => 'check', 'options' => ['class' => 'text-green']]),
]);
```

## 带头像

使用 `avatar` 显示用户头像：

```php-demo
use bestyii\tabler\Toast;

echo Toast::widget([
    'title' => '张三',
    'subtitle' => '5分钟前',
    'body' => '您的审批已通过，请查看详情。',
    'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop',
]);
```

## 隐藏关闭按钮

设置 `showCloseButton` 为 false：

```php-demo
use bestyii\tabler\Toast;

echo Toast::widget([
    'title' => '提示',
    'body' => '这条消息没有关闭按钮。',
    'showCloseButton' => false,
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `title` | string | - | 标题 |
| `subtitle` | string | - | 副标题（如时间） |
| `body` | string | - | 内容 |
| `icon` | string | - | 图标 |
| `avatar` | string | - | 头像 URL |
| `showCloseButton` | bool | true | 是否显示关闭按钮 |
| `show` | bool | true | 是否立即显示 |

## 放置位置

通常将 Toast 放置在固定位置的容器中：

```php
<div class="toast-container position-fixed top-0 end-0 p-3">
    <?= Toast::widget([...]) ?>
</div>
```

## JavaScript 控制

```javascript
// 显示
const toast = new bootstrap.Toast(document.getElementById('toastId'));
toast.show();

// 隐藏
toast.hide();
```
