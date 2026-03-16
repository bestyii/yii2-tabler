---
title: PageHeader 页面头部
description: 页面头部组件用于显示页面标题和操作按钮
keywords: [page header, 页面头部, 标题, 面包屑]
related: [Breadcrumbs, Card]
---

页面头部组件用于统一显示页面标题、面包屑和操作按钮。

## 基础用法
```php-demo
use bestyii\tabler\PageHeader;

echo PageHeader::widget([
    'title' => '用户管理',
]);
```

## 带副标题
```php-demo
use bestyii\tabler\PageHeader;

echo PageHeader::widget([
    'title' => '用户列表',
    'subtitle' => '管理系统中的所有用户',
]);
```

## 带操作按钮
```php-demo
use bestyii\tabler\PageHeader;
use yii\helpers\Html;

echo PageHeader::widget([
    'title' => '产品管理',
    'actions' => [
        ['label' => '新增', 'url' => '#', 'icon' => 'plus', 'options' => ['class' => 'btn btn-primary']],
        ['label' => '导出', 'url' => '#', 'icon' => 'download', 'options' => ['class' => 'btn btn-light']],
    ],
]);
```

## 带头像
```php-demo
use bestyii\tabler\PageHeader;

echo PageHeader::widget([
    'title' => '张三',
    'subtitle' => '高级工程师',
    'avatar' => ['initials' => 'ZS', 'color' => 'primary', 'size' => 'lg'],
]);
```

## 完整示例
```php-demo
use bestyii\tabler\PageHeader;

echo PageHeader::widget([
    'title' => '订单详情',
    'subtitle' => '订单编号: #123456',
    'actions' => [
        ['label' => '编辑', 'url' => '#', 'icon' => 'edit', 'options' => ['class' => 'btn btn-primary']],
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `title` | string | - | 页面标题 |
| `subtitle` | string | - | 副标题 |
| `preTitle` | string | - | 标题前缀 |
| `actions` | array | - | 操作按钮配置 |
| `avatar` | array | - | 头像配置 |
| `content` | string | - | 自定义内容 |
| `breadcrumb` | array | - | 面包屑配置 |
