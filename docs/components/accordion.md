---
title: Accordion 手风琴
description: 手风琴组件用于折叠和展开内容区域
keywords: [accordion, 手风琴, 折叠面板]
related: [Tabs, Card]
---

手风琴组件用于折叠和展开内容区域，适合显示分组信息。

## 基础用法
```php-demo
use bestyii\tabler\Accordion;

echo Accordion::widget([
    'items' => [
        ['title' => '什么是 Tabler?', 'content' => '<p>Tabler 是一个基于 Bootstrap 的 UI 组件库。</p>', 'active' => true],
        ['title' => '如何安装?', 'content' => '<p>通过 Composer 安装: <code>composer require bestyii/yii2-tabler</code></p>'],
        ['title' => '如何使用?', 'content' => '<p>参考文档中的示例代码即可快速上手。</p>'],
    ],
]);
```
## Flush 样式
设置 `flush` 为 true 嶈除默认边框：
```php-demo
use bestyii\tabler\Accordion;

echo Accordion::widget([
    'flush' => true,
    'items' => [
        ['title' => '项目一', 'content' => '<p>这是第一个折叠项的内容。</p>'],
        ['title' => '项目二', 'content' => '<p>这是第二个折叠项的内容。</p>'],
        ['title' => '项目三', 'content' => '<p>这是第三个折叠项的内容。</p>'],
    ],
]);
```
## 带图标
在 item 中设置 `icon` 属性：
```php-demo
use bestyii\tabler\Accordion;

echo Accordion::widget([
    'items' => [
        ['title' => '用户设置', 'content' => '<p>配置您的个人信息和偏好设置。</p>', 'icon' => 'user', 'active' => true],
        ['title' => '安全设置', 'content' => '<p>管理密码和两步验证。</p>', 'icon' => 'lock'],
        ['title' => '通知设置', 'content' => '<p>配置邮件和推送通知。</p>', 'icon' => 'bell'],
    ],
]);
```
## 自定义切换图标
设置 `toggleIcon` 属性：
```php-demo
use bestyii\tabler\Accordion;

echo Accordion::widget([
    'toggleIcon' => 'plus',
    'items' => [
        ['title' => '问题一', 'content' => '<p>第一个问题的答案。</p>', 'active' => true],
        ['title' => '问题二', 'content' => '<p>第二个问题的答案。</p>'],
        ['title' => '问题三', 'content' => '<p>第三个问题的答案。</p>'],
    ],
]);
```
## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 折叠项列表 |
| `flush` | bool | false | 是否为 flush 样式 |
| `headerTag` | string | 'h2' | 标题 HTML 标签 |
| `toggleIcon` | string | 'chevron-down' | 切换图标名称 |
| `options` | array | [] | 容器 HTML 属性 |

## items 配置

每个 item 支持以下属性：

| 属性 | 类型 | 说明 |
|------|------|------|
| `title` | string | 标题文本 |
| `content` | string | 内容 |
| `active` | bool | 是否默认展开 |
| `icon` | string | 标题图标 |
| `toggleIcon` | string | 自定义切换图标 |
| `options` | array | 项目 HTML 属性 |
| `bodyOptions` | array | 内容区 HTML 属性 |
