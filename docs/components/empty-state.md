---
title: EmptyState 空状态
description: 空状态用于在没有数据时显示友好提示
keywords: [empty, state, 空状态, placeholder]
related: [Icon, Button]
---

EmptyState 用于在没有数据时显示友好的空状态提示，引导用户进行下一步操作。

## 基础用法
```php-demo
use bestyii\tabler\EmptyState;

echo EmptyState::widget([
    'title' => '暂无数据',
    'subtitle' => '这里还没有任何内容',
]);
```

## 带图标
```php-demo
use bestyii\tabler\EmptyState;

echo EmptyState::widget([
    'icon' => 'inbox',
    'title' => '收件箱为空',
    'subtitle' => '当有新消息时，您将在这里看到它们',
]);
```

## 带操作按钮
```php-demo
use bestyii\tabler\EmptyState;

echo EmptyState::widget([
    'icon' => 'users',
    'title' => '还没有客户',
    'subtitle' => '添加您的第一个客户开始管理业务',
    'buttonText' => '添加客户',
    'buttonLink' => '#add-customer',
]);
```

## 不同图标样式
```php-demo
use bestyii\tabler\EmptyState;

echo EmptyState::widget([
    'icon' => 'file-text',
    'title' => '没有文档',
    'subtitle' => '上传文档以便团队协作',
    'buttonText' => '上传文档',
    'buttonLink' => '#upload',
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `title` | string | null | 标题 |
| `subtitle` | string | null | 副标题/描述 |
| `icon` | string | null | Tabler 图标名称 |
| `image` | string | null | 图片 URL（替代图标） |
| `buttonText` | string | null | 按钮文本 |
| `buttonLink` | array\|string | null | 按钮链接 |
| `options` | array | [] | 容器的 HTML 属性 |
