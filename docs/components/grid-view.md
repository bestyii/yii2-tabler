---
title: GridView 数据表格
description: 扩展的 GridView 组件，集成 Tabler 样式
keywords: [grid, table, 数据表格, gridview]
related: [LinkPager, Card, Datagrid]
---

GridView 是对 Yii2 GridView 的扩展，集成了 Tabler 的卡片样式和分页组件。

## 基础用法
```php-demo
use yii\data\ArrayDataProvider;
use bestyii\tabler\grid\GridView;

$dataProvider = new ArrayDataProvider([
    'allModels' => [
        ['id' => 1, 'name' => '张三', 'email' => 'zhangsan@example.com', 'status' => '活跃'],
        ['id' => 2, 'name' => '李四', 'email' => 'lisi@example.com', 'status' => '禁用'],
        ['id' => 3, 'name' => '王五', 'email' => 'wangwu@example.com', 'status' => '活跃'],
    ],
    'pagination' => ['pageSize' => 10],
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'email',
        'status',
    ],
]);
```

## 带标题
```php-demo
use yii\data\ArrayDataProvider;
use bestyii\tabler\grid\GridView;

$dataProvider = new ArrayDataProvider([
    'allModels' => [
        ['id' => 1, 'name' => '产品 A', 'price' => '¥99', 'stock' => 100],
        ['id' => 2, 'name' => '产品 B', 'price' => '¥199', 'stock' => 50],
        ['id' => 3, 'name' => '产品 C', 'price' => '¥299', 'stock' => 30],
    ],
    'pagination' => false,
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'title' => '产品列表',
    'columns' => [
        'id',
        'name',
        'price',
        'stock',
    ],
]);
```

## 斑马纹样式
```php-demo
use yii\data\ArrayDataProvider;
use bestyii\tabler\grid\GridView;

$dataProvider = new ArrayDataProvider([
    'allModels' => [
        ['id' => 1, 'task' => '任务 A', 'progress' => '100%'],
        ['id' => 2, 'task' => '任务 B', 'progress' => '60%'],
        ['id' => 3, 'task' => '任务 C', 'progress' => '30%'],
    ],
    'pagination' => false,
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'striped' => true,
    'columns' => [
        'id',
        'task',
        'progress',
    ],
]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `tableOptions` | array | ['class' => 'table card-table table-vcenter text-nowrap'] | 表格 HTML 属性 |
| `options` | array | ['class' => 'card'] | 容器 HTML 属性 |
| `layout` | string | "{items}\n<div class=\"card-footer...\">" | 布局模板 |
| `pager` | array | LinkPager 配置 | 分页器配置 |
| `responsive` | bool | true | 是否启用响应式包装 |
| `renderCardHeader` | bool | false | 是否渲染卡片标题 |
| `cardTitle` | string | '' | 卡片标题 |
| `title` | string | null | 卡片标题（设置后自动启用 renderCardHeader） |
| `hover` | bool | true | 是否启用悬停效果 |
| `striped` | bool | false | 是否启用斑马纹 |
| `outline` | bool | false | 是否启用轮廓样式 |
