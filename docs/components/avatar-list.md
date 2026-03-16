---
title: AvatarList 头像列表
description: 头像列表用于显示一组用户头像
keywords: [avatar, 头像, 列表, 用户组]
related: [Avatar, Badge]
---

头像列表组件用于显示一组用户头像，支持堆叠模式。

## 基础用法
```php-demo
use bestyii\tabler\AvatarList;

echo AvatarList::widget([
    'items' => [
        ['initials' => 'A', 'color' => 'primary'],
        ['initials' => 'B', 'color' => 'success'],
        ['initials' => 'C', 'color' => 'warning'],
        ['initials' => 'D', 'color' => 'danger'],
    ],
]);
```

## 堆叠模式
```php-demo
use bestyii\tabler\AvatarList;

echo AvatarList::widget([
    'stacked' => true,
    'items' => [
        ['initials' => 'A', 'color' => 'primary'],
        ['initials' => 'B', 'color' => 'success'],
        ['initials' => 'C', 'color' => 'warning'],
        ['initials' => 'D', 'color' => 'danger'],
    ],
]);
```

## 统一尺寸
```php-demo
use bestyii\tabler\AvatarList;

echo AvatarList::widget([
    'stacked' => true,
    'size' => 'lg',
    'items' => [
        ['initials' => 'A', 'color' => 'primary'],
        ['initials' => 'B', 'color' => 'success'],
        ['initials' => 'C', 'color' => 'warning'],
    ],
]);
```

## 使用 begin/end 模式
```php-demo
use bestyii\tabler\AvatarList;
use bestyii\tabler\Avatar;

AvatarList::begin(['stacked' => true]);
echo Avatar::widget(['initials' => 'A', 'color' => 'primary']);
echo Avatar::widget(['initials' => 'B', 'color' => 'success']);
echo Avatar::widget(['initials' => 'C', 'color' => 'warning']);
AvatarList::end();
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `items` | array | [] | 头像配置数组 |
| `stacked` | bool | false | 是否堆叠显示 |
| `size` | string | - | 统一尺寸: xs/sm/md/lg/xl |
