---
title: Alert 警告
description: 警告组件用于向用户显示重要消息和反馈
keywords: [alert, 警告, 消息, 提示]
related: [Toast, Badge]
---

警告组件用于显示重要的消息、通知或反馈。

## 基础用法

支持多种类型的警告消息：

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'success',
    'body' => '操作成功完成！',
]);
```

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'warning',
    'body' => '请注意，这个操作可能会有风险。',
]);
```

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'danger',
    'body' => '发生错误，请检查您的输入。',
]);
```

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'info',
    'body' => '这是一条提示信息。',
]);
```

## 带标题

使用 `title` 属性添加标题：

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'success',
    'title' => '恭喜！',
    'body' => '您的账户已成功创建。',
]);
```

## 带图标

使用 `icon` 属性添加图标：

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'success',
    'title' => '操作成功',
    'body' => '数据已保存到服务器。',
    'icon' => 'check',
]);
```

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'danger',
    'title' => '错误',
    'body' => '无法连接到服务器。',
    'icon' => 'alert-triangle',
]);
```

## 重要警告

使用 `isImportant` 属性创建重要警告（填充背景）：

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'warning',
    'title' => '重要提醒',
    'body' => '您的账户即将到期，请及时续费。',
    'icon' => 'alert-circle',
    'isImportant' => true,
]);
```

## 不可关闭

默认警告可以关闭，设置 `isDismissible` 为 false 禁用：

```php-demo
use bestyii\tabler\Alert;

echo Alert::widget([
    'type' => 'info',
    'body' => '这是一条不可关闭的提示信息。',
    'isDismissible' => false,
]);
```

## 使用 begin/end 模式

在 begin 和 end 之间放置任意内容：

```php-demo
use bestyii\tabler\Alert;

Alert::begin([
    'type' => 'info',
    'title' => '系统公告',
]);

echo '<ul class="mb-0">';
echo '<li>系统将于今晚 22:00 进行维护</li>';
echo '<li>预计维护时长 2 小时</li>';
echo '<li>请提前保存您的工作</li>';
echo '</ul>';

Alert::end();
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `type` | string | 'info' | 类型: success/warning/danger/info |
| `title` | string | - | 标题 |
| `body` | string | - | 内容（不使用 begin/end 时） |
| `icon` | string | - | 图标名称 |
| `avatar` | string/array | - | 头像配置或 HTML |
| `isImportant` | bool | false | 是否为重要警告 |
| `isDismissible` | bool | true | 是否可关闭 |
| `divider` | bool | false | 是否显示分隔线 |
| `status` | string | - | 状态条位置: top/start |
| `options` | array | [] | HTML 属性 |

## 适用场景

- 操作成功/失败提示
- 系统公告
- 表单验证错误
- 重要警告提醒
