---
title: LinkPager 分页器
description: 分页器用于在数据列表中导航
keywords: [pager, pagination, 分页, 导航]
related: [GridView, Icon]
---

LinkPager 是对 Yii2 分页器的扩展，使用 Tabler 样式和图标。

## 基础用法
```php-demo
use yii\data\Pagination;
use bestyii\tabler\LinkPager;

$pagination = new Pagination([
    'totalCount' => 100,
    'pageSize' => 10,
    'page' => 3,
]);

echo LinkPager::widget([
    'pagination' => $pagination,
]);
```

## 完整配置
```php-demo
use yii\data\Pagination;
use bestyii\tabler\LinkPager;

$pagination = new Pagination([
    'totalCount' => 500,
    'pageSize' => 20,
    'page' => 5,
]);

echo LinkPager::widget([
    'pagination' => $pagination,
    'maxButtonCount' => 5,
    'firstPageLabel' => true,
    'lastPageLabel' => true,
]);
```

## 紧凑模式
```php-demo
use yii\data\Pagination;
use bestyii\tabler\LinkPager;

$pagination = new Pagination([
    'totalCount' => 50,
    'pageSize' => 10,
    'page' => 1,
]);

echo LinkPager::widget([
    'pagination' => $pagination,
    'maxButtonCount' => 3,
    'firstPageLabel' => false,
    'lastPageLabel' => false,
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `pagination` | Pagination | null | 分页对象 |
| `options` | array | ['class' => 'pagination m-0 ms-auto'] | 容器 HTML 属性 |
| `linkContainerOptions` | array | ['class' => 'page-item'] | 链接容器属性 |
| `linkOptions` | array | ['class' => 'page-link'] | 链接属性 |
| `maxButtonCount` | int | 10 | 最大按钮数 |
| `firstPageLabel` | bool\|string | false | 首页标签 |
| `lastPageLabel` | bool\|string | false | 末页标签 |
| `nextPageLabel` | string | 图标 + 'Next' | 下一页标签 |
| `prevPageLabel` | string | 图标 + 'Prev' | 上一页标签 |
| `activePageCssClass` | string | 'active' | 当前页 CSS 类 |
| `disabledPageCssClass` | string | 'disabled' | 禁用页 CSS 类 |
