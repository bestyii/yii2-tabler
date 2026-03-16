---
title: Tabs 标签页
description: 标签页组件用于在相同区域内切换显示不同内容
keywords: [tabs, 标签页, 选项卡]
related: [Accordion, Card]
---

标签页组件用于组织和切换显示多个内容区域。

## 基础用法

```php-demo
use bestyii\tabler\Tabs;

echo Tabs::widget([
    'items' => [
        ['label' => '首页', 'content' => '<p class="p-3">这是首页内容。</p>', 'active' => true],
        ['label' => '个人资料', 'content' => '<p class="p-3">这是个人资料内容。</p>'],
        ['label' => '设置', 'content' => '<p class="p-3">这是设置内容。</p>'],
    ],
]);
```

## 药丸样式
设置 `navType` 为 `nav-pills`：

```php-demo
use bestyii\tabler\Tabs;

echo Tabs::widget([
    'navType' => 'nav-pills',
    'items' => [
        ['label' => '全部', 'content' => '<p class="p-3">显示全部内容。</p>', 'active' => true],
        ['label' => '进行中', 'content' => '<p class="p-3">显示进行中的任务。</p>'],
        ['label' => '已完成', 'content' => '<p class="p-3">显示已完成的任务。</p>'],
    ],
]);
```

## 卡片标签页
设置 `card` 为 true 用于卡片头部：

```php-demo
use bestyii\tabler\Tabs;

echo Tabs::widget([
    'card' => true,
    'items' => [
        ['label' => '概览', 'content' => '<div class="p-3">概览内容</div>', 'active' => true],
        ['label' => '分析', 'content' => '<div class="p-3">分析内容</div>'],
        ['label' => '导出', 'content' => '<div class="p-3">导出内容</div>'],
    ],
]);
```
## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 标签项列表 |
| `navType` | string | 'nav-tabs' | 导航类型: nav-tabs/nav-pills |
| `card` | bool | false | 是否为卡片标签页 |
| `options` | array | [] | 导航容器 HTML 属性 |
| `tabContentOptions` | array | [] | 内容容器 HTML 属性 |

## items 配置

每个 item 支持以下属性：

| 属性 | 类型 | 说明 |
|------|------|------|
| `label` | string | 标签文本 |
| `content` | string | 内容 |
| `active` | bool | 是否激活 |
| `options` | array | 面板 HTML 属性 |
| `linkOptions` | array | 链接 HTML 属性 |
| `headerOptions` | array | 头部 HTML 属性 |
