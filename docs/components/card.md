---
title: Card 卡片
description: 卡片是灵活的容器组件，用于组织和展示内容
keywords: [card, 卡片, 容器]
related: [Badge, Alert]
---

卡片是一个灵活的用户界面元素，帮助将内容组织成有意义的部分。

## 基础卡片

使用 `Card::begin()` 和 `Card::end()` 创建卡片容器：

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '卡片标题',
    'subtitle' => '这是卡片的副标题',
]);

echo '<p class="text-muted">这是卡片的内容区域，可以放置任何内容。</p>';

Card::end();
```

## 简单卡片

不使用 begin/end 模式，直接使用 content 属性：

```php-demo
use bestyii\tabler\Card;

echo Card::widget([
    'title' => '简单卡片',
    'content' => '这是通过 content 属性设置的内容。',
]);
```

## 状态颜色

使用 `statusColor` 属性为卡片添加状态条：

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '成功状态',
    'statusColor' => 'success',
]);
echo '<p class="text-muted mb-0">这是一个带有成功状态条的卡片。</p>';
Card::end();
```

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '危险状态',
    'statusColor' => 'danger',
    'statusPosition' => 'start',
]);
echo '<p class="text-muted mb-0">状态条在左侧的卡片。</p>';
Card::end();
```

## 带工具栏的卡片

使用 `tools` 属性添加操作按钮：

```php-demo
use bestyii\tabler\Card;
use yii\helpers\Html;

Card::begin([
    'title' => '带工具栏',
    'tools' => Html::a('查看', '#', ['class' => 'btn btn-primary btn-sm']) . ' ' . Html::a('编辑', '#', ['class' => 'btn btn-light btn-sm']),
]);
echo '<p class="text-muted mb-0">卡片的工具栏可以放置操作按钮。</p>';
Card::end();
```

## 卡片尺寸

使用 `size` 属性调整卡片内边距：

```php-demo
use bestyii\tabler\Card;

echo Card::widget([
    'title' => '小尺寸卡片',
    'size' => 'sm',
    'content' => 'size = sm',
]);
```

```php-demo
use bestyii\tabler\Card;

echo Card::widget([
    'title' => '大尺寸卡片',
    'size' => 'lg',
    'content' => 'size = lg，适合放置大量文本内容。',
]);
```

## 带徽章（Ribbon）的卡片

使用 `ribbon` 属性添加角标：

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '新品上线',
    'ribbon' => ['text' => 'NEW', 'color' => 'blue'],
]);
echo '<p class="text-muted mb-0">带有角标的卡片，常用于标记新内容或促销信息。</p>';
Card::end();
```

## 加载状态

使用 `loading` 属性显示加载状态：

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '加载中',
    'loading' => true,
]);
echo '<p class="text-muted mb-0">卡片正在加载数据...</p>';
Card::end();
```

## 卡片变体

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '堆叠卡片',
    'stacked' => true,
]);
echo '<p class="text-muted mb-0">stacked = true</p>';
Card::end();
```

```php-demo
use bestyii\tabler\Card;

Card::begin([
    'title' => '无边框卡片',
    'borderless' => true,
]);
echo '<p class="text-muted mb-0">borderless = true</p>';
Card::end();
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `title` | string | - | 卡片标题 |
| `subtitle` | string | - | 卡片副标题 |
| `content` | string | - | 卡片内容（不使用 begin/end 时） |
| `statusColor` | string | - | 状态条颜色 |
| `statusPosition` | string | 'top' | 状态条位置: top/start |
| `tools` | string/array | - | 工具栏内容 |
| `size` | string | - | 尺寸: sm/md/lg |
| `ribbon` | array | - | 角标配置: text, color, outside |
| `stamp` | array | - | 印章配置: icon, color |
| `loading` | bool | false | 是否显示加载状态 |
| `stacked` | bool | false | 是否为堆叠样式 |
| `borderless` | bool | false | 是否无边框 |
| `flush` | bool | false | 是否为 flush 样式 |
| `footer` | string | - | 页脚内容 |
| `options` | array | [] | 容器 HTML 属性 |
| `bodyOptions` | array | [] | 内容区 HTML 属性 |
