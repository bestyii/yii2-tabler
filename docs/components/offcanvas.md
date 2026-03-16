---
title: Offcanvas 侧边栏
description: 侧边栏组件用于在屏幕边缘显示隐藏内容
keywords: [offcanvas, 侧边栏, 抽屉]
related: [Modal, Dropdown]
---

侧边栏组件用于在屏幕边缘显示隐藏内容，类似于抽屉效果。

## 基础用法
```php-demo
use bestyii\tabler\Offcanvas;
use bestyii\tabler\Button;

$offcanvasId = 'offcanvas-demo';

Offcanvas::begin([
    'id' => $offcanvasId,
    'title' => '侧边栏标题',
]);
echo '<p class="text-muted">这是侧边栏的内容区域。</p>';
Offcanvas::end();

echo Button::widget([
    'label' => '打开侧边栏',
    'color' => 'primary',
    'options' => ['data-bs-toggle' => 'offcanvas', 'data-bs-target' => '#' . $offcanvasId],
]);
```

## 不同位置
```php-demo
use bestyii\tabler\Offcanvas;
use bestyii\tabler\Button;

$offcanvasStart = 'offcanvas-start';
$offcanvasEnd = 'offcanvas-end';
$offcanvasTop = 'offcanvas-top';

Offcanvas::begin(['id' => $offcanvasStart, 'title' => '左侧边栏', 'placement' => 'start']);
echo '<p class="text-muted">左侧边栏内容</p>';
Offcanvas::end();

Offcanvas::begin(['id' => $offcanvasEnd, 'title' => '右侧边栏', 'placement' => 'end']);
echo '<p class="text-muted">右侧边栏内容</p>';
Offcanvas::end();

Offcanvas::begin(['id' => $offcanvasTop, 'title' => '顶部栏', 'placement' => 'top']);
echo '<p class="text-muted">顶部栏内容</p>';
Offcanvas::end();

echo Button::widget(['label' => '左侧', 'color' => 'secondary', 'outline' => true, 'options' => ['data-bs-toggle' => 'offcanvas', 'data-bs-target' => '#' . $offcanvasStart]]);
echo Button::widget(['label' => '右侧', 'color' => 'secondary', 'outline' => true, 'options' => ['data-bs-toggle' => 'offcanvas', 'data-bs-target' => '#' . $offcanvasEnd]]);
echo Button::widget(['label' => '顶部', 'color' => 'secondary', 'outline' => true, 'options' => ['data-bs-toggle' => 'offcanvas', 'data-bs-target' => '#' . $offcanvasTop]]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `title` | string | - | 标题 |
| `body` | string | - | 内容（不使用 begin/end 时） |
| `placement` | string | 'end' | 位置: start/end/top/bottom |
| `blur` | bool | true | 是否显示背景模糊 |
| `options` | array | [] | 容器 HTML 属性 |

## 触发方式

```html
<!-- 按钮触发 -->
<button data-bs-toggle="offcanvas" data-bs-target="#myOffcanvas">打开</button>

<!-- JavaScript 触发 -->
<script>$('#myOffcanvas.Offcanvas.getInstance().show();</script>
```
