---
title: Modal 模态框
description: 模态框用于在不离开当前页面的情况下显示内容或交互
keywords: [modal, 模态框, 弹窗, 对话框]
related: [Alert, Toast]
---

模态框是一个覆盖在页面上的对话框，用于显示重要信息或收集用户输入。

## 基础用法

通过 `data-bs-toggle` 和 `data-bs-target` 触发模态框：

```php-demo
use bestyii\tabler\Modal;
use bestyii\tabler\Button;
use yii\helpers\Html;

$modalId = 'modal-basic';

Modal::begin([
    'id' => $modalId,
    'title' => '模态框标题',
]);
echo '<p>这是模态框的内容区域。</p>';
Modal::end();

echo Button::widget([
    'label' => '打开模态框',
    'color' => 'primary',
    'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalId],
]);
```

## 不同尺寸

使用 `size` 属性设置模态框大小：

```php-demo
use bestyii\tabler\Modal;
use bestyii\tabler\Button;

$modalSm = 'modal-sm-demo';
$modalLg = 'modal-lg-demo';
$modalXl = 'modal-xl-demo';

Modal::begin(['id' => $modalSm, 'title' => '小模态框', 'size' => 'sm']);
echo '<p>小尺寸模态框</p>';
Modal::end();

Modal::begin(['id' => $modalLg, 'title' => '大模态框', 'size' => 'lg']);
echo '<p>大尺寸模态框</p>';
Modal::end();

Modal::begin(['id' => $modalXl, 'title' => '超大模态框', 'size' => 'xl']);
echo '<p>超大尺寸模态框</p>';
Modal::end();

echo Button::widget(['label' => 'Small', 'color' => 'secondary', 'outline' => true, 'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalSm]]);
echo Button::widget(['label' => 'Large', 'color' => 'secondary', 'outline' => true, 'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalLg]]);
echo Button::widget(['label' => 'Extra Large', 'color' => 'secondary', 'outline' => true, 'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalXl]]);
```

## 带状态颜色

使用 `statusColor` 属性添加状态条：

```php-demo
use bestyii\tabler\Modal;
use bestyii\tabler\Button;

$modalSuccess = 'modal-success-demo';
$modalDanger = 'modal-danger-demo';

Modal::begin(['id' => $modalSuccess, 'title' => '成功', 'statusColor' => 'success']);
echo '<p class="mb-0">操作已成功完成！</p>';
Modal::end();

Modal::begin(['id' => $modalDanger, 'title' => '警告', 'statusColor' => 'danger']);
echo '<p class="mb-0">确定要删除此项目吗？此操作不可撤销。</p>';
Modal::end();

echo Button::widget(['label' => '成功状态', 'color' => 'success', 'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalSuccess]]);
echo Button::widget(['label' => '危险状态', 'color' => 'danger', 'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalDanger]]);
```

## 带页脚

使用 `footer` 属性添加底部按钮：

```php-demo
use bestyii\tabler\Modal;
use bestyii\tabler\Button;
use yii\helpers\Html;

$modalFooter = 'modal-footer-demo';

Modal::begin([
    'id' => $modalFooter,
    'title' => '确认操作',
    'footer' => Button::widget(['label' => '取消', 'color' => 'secondary', 'options' => ['data-bs-dismiss' => 'modal']]) . ' ' . Button::widget(['label' => '确认', 'color' => 'primary']),
]);
echo '<p class="mb-0">您确定要执行此操作吗？</p>';
Modal::end();

echo Button::widget(['label' => '带页脚的模态框', 'color' => 'primary', 'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalFooter]]);
```

## 简单模式

使用 `body` 属性直接设置内容：

```php-demo
use bestyii\tabler\Modal;
use bestyii\tabler\Button;

$modalSimple = 'modal-simple-demo';

echo Modal::widget([
    'id' => $modalSimple,
    'title' => '简单模态框',
    'body' => '这是通过 body 属性设置的内容。',
]);

echo Button::widget(['label' => '简单模态框', 'color' => 'primary', 'outline' => true, 'options' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#' . $modalSimple]]);
```

## 属性说明

| 属性 | 类型 | 默认值 | 说明 |
|------|------|--------|------|
| `title` | string | - | 标题 |
| `header` | string | - | 自定义头部内容 |
| `body` | string | - | 内容（不使用 begin/end 时） |
| `footer` | string | - | 页脚内容 |
| `size` | string | - | 尺寸: sm/lg/xl |
| `statusColor` | string | - | 状态条颜色 |
| `centered` | bool | true | 垂直居中 |
| `blur` | bool | true | 背景模糊 |
| `closeButton` | array | [] | 关闭按钮配置，设为 false 禁用 |
| `options` | array | [] | 容器 HTML 属性 |

## 触发方式

```html
<!-- 按钮触发 -->
<button data-bs-toggle="modal" data-bs-target="#modalId">打开</button>

<!-- JavaScript 触发 -->
<script>$('#modalId').modal('show');</script>
```
