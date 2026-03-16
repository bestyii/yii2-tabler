---
title: Breadcrumbs 面包屑
description: 面包屑用于显示页面导航路径
keywords: [breadcrumbs, 面包屑, 导航, 路径]
related: [PageHeader, Badge]
---

面包屑组件用于显示页面的导航路径。

## 基础用法
```php-demo
use bestyii\tabler\Breadcrumbs;

echo Breadcrumbs::widget([
    'links' => [
        ['label' => '用户管理', 'url' => '#'],
        ['label' => '用户列表', 'url' => '#'],
        '用户详情',
    ],
]);
```

## 隐藏首页
```php-demo
use bestyii\tabler\Breadcrumbs;

echo Breadcrumbs::widget([
    'homeLink' => false,
    'links' => [
        ['label' => '产品', 'url' => '#'],
        ['label' => '分类', 'url' => '#'],
        '详情',
    ],
]);
```

## 带图标
```php-demo
use bestyii\tabler\Breadcrumbs;

echo Breadcrumbs::widget([
    'homeIcon' => true,
    'links' => [
        ['label' => '设置', 'url' => '#', 'icon' => 'settings'],
        ['label' => '安全', 'url' => '#', 'icon' => 'lock'],
        '密码',
    ],
]);
```

## 不同样式
```php-demo
use bestyii\tabler\Breadcrumbs;

echo '<div class="mb-2">' . Breadcrumbs::widget([
    'type' => 'arrows',
    'links' => ['Step 1', 'Step 2', 'Step 3'],
]) . '</div>';

echo '<div class="mb-2">' . Breadcrumbs::widget([
    'type' => 'dots',
    'links' => ['Step 1', 'Step 2', 'Step 3'],
]) . '</div>';

echo Breadcrumbs::widget([
    'muted' => true,
    'links' => ['首页', '列表', '详情'],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `links` | array | [] | 链接列表 |
| `homeLink` | array | - | 首页链接，false 则隐藏 |
| `homeIcon` | bool | false | 是否使用首页图标 |
| `type` | string | - | 类型: arrows/bullets/dots |
| `muted` | bool | false | 是否使用柔和颜色 |

## links 配置

每个 link 支持以下属性：

| 属性 | 类型 | 说明 |
|------|------|------|
| `label` | string | 显示文本 |
| `url` | string | 链接地址（不设置则为当前页） |
| `icon` | string | 图标名称 |
