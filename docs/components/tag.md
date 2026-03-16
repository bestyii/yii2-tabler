---
title: Tag 标签
description: 标签用于分类、标记和筛选
keywords: [tag, 标签, 分类, chip]
related: [Badge, SelectGroup]
---

Tag 用于显示可分类、可移除的标签，常用于文章标签、筛选条件等场景。

## 基础用法
```php-demo
use bestyii\tabler\Tag;

echo Tag::widget(['content' => '标签']);
```

## 带颜色
```php-demo
use bestyii\tabler\Tag;

echo Tag::widget(['content' => '蓝色', 'color' => 'blue']);
echo ' ';
echo Tag::widget(['content' => '红色', 'color' => 'red']);
echo ' ';
echo Tag::widget(['content' => '绿色', 'color' => 'green']);
echo ' ';
echo Tag::widget(['content' => '黄色', 'color' => 'yellow']);
```

## 药丸形状
```php-demo
use bestyii\tabler\Tag;

echo Tag::widget(['content' => 'PHP', 'color' => 'azure', 'pill' => true]);
echo ' ';
echo Tag::widget(['content' => 'JavaScript', 'color' => 'lime', 'pill' => true]);
echo ' ';
echo Tag::widget(['content' => 'Python', 'color' => 'orange', 'pill' => true]);
```

## 可移除
```php-demo
use bestyii\tabler\Tag;

echo Tag::widget(['content' => '已选筛选', 'color' => 'primary', 'isDismissible' => true]);
echo ' ';
echo Tag::widget(['content' => '技术文章', 'color' => 'info', 'isDismissible' => true]);
```

## 标签列表
```php-demo
use bestyii\tabler\Tag;

$tags = ['前端开发', '后端开发', '数据库', 'DevOps', 'UI设计'];
foreach ($tags as $i => $tag) {
    $colors = ['blue', 'azure', 'indigo', 'purple', 'pink'];
    echo Tag::widget(['content' => $tag, 'color' => $colors[$i % count($colors)]]);
    echo ' ';
}
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `content` | string | null | 标签内容 |
| `label` | string | null | content 别名 |
| `text` | string | null | content 别名 |
| `color` | string | null | 背景颜色（blue/red/green/yellow 等） |
| `pill` | bool | false | 是否使用药丸形状 |
| `isDismissible` | bool | false | 是否显示关闭按钮 |
| `options` | array | [] | 容器的 HTML 属性 |
