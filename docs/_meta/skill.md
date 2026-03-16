# Yii2 Tabler Widgets Skill

作为 AI 编码助手，当需要使用 Tabler UI 组件时，应遵循以下规范。

## 命名空间

```php
use bestyii\tabler\{WidgetName};
```

## 常用颜色值

- `primary` - 主要（蓝色）
- `secondary` - 次要（灰色）
- `success` - 成功（绿色）
- `warning` - 警告（黄色）
- `danger` - 危险（红色）
- `info` - 信息（青色）

## 快速参考

### Badge 徽章

```php
use bestyii\tabler\Badge;

Badge::widget(['text' => 'New', 'color' => 'primary']);
Badge::widget(['text' => 'Success', 'color' => 'success', 'outline' => true]);
Badge::widget(['text' => '5', 'color' => 'danger', 'pill' => true]);
```

### Card 卡片

```php
use bestyii\tabler\Card;

Card::begin(['title' => '标题', 'statusColor' => 'success']);
echo '内容';
Card::end();
```

### Alert 警告

```php
use bestyii\tabler\Alert;

Alert::widget(['type' => 'success', 'body' => '操作成功']);
Alert::widget(['type' => 'danger', 'title' => '错误', 'body' => '操作失败']);
```

### Button 按钮

```php
use bestyii\tabler\Button;

Button::widget(['label' => '提交', 'color' => 'primary']);
Button::widget(['label' => '取消', 'color' => 'secondary', 'outline' => true]);
Button::widget(['icon' => 'plus', 'color' => 'primary', 'variant' => 'icon']);
```

### Icon 图标

```php
use bestyii\tabler\Icon;

Icon::widget(['name' => 'user']);
Icon::widget(['name' => 'settings', 'style' => 'filled']);
```

### Modal 模态框

```php
use bestyii\tabler\Modal;

Modal::begin(['title' => '确认', 'size' => 'sm', 'footer' => Button::widget(['label' => '确定'])]);
echo '内容';
Modal::end();
```

### Tabs 标签页

```php
use bestyii\tabler\Tabs;

Tabs::widget([
    'items' => [
        ['label' => '标签1', 'content' => '内容1'],
        ['label' => '标签2', 'content' => '内容2'],
    ],
]);
```

### Toast 消息

```php
use bestyii\tabler\Toast;

Toast::widget(['title' => '成功', 'body' => '操作已完成', 'type' => 'success']);
```

### Tag 标签

```php
use bestyii\tabler\Tag;

Tag::widget(['content' => 'PHP', 'color' => 'blue']);
Tag::widget(['content' => '前端', 'color' => 'lime', 'pill' => true]);
Tag::widget(['content' => '已选', 'color' => 'primary', 'isDismissible' => true]);
```

### Nav 导航

```php
use bestyii\tabler\Nav;

Nav::widget([
    'items' => [
        ['label' => '首页', 'url' => '#', 'icon' => 'home'],
        ['label' => '产品', 'url' => '#', 'icon' => 'package'],
    ],
]);
```

### Progress 进度条

```php
use bestyii\tabler\Progress;

Progress::widget(['percent' => 75, 'color' => 'success']);
```

### EmptyState 空状态

```php
use bestyii\tabler\EmptyState;

EmptyState::widget([
    'icon' => 'inbox',
    'title' => '暂无数据',
    'subtitle' => '点击添加第一条记录',
    'buttonText' => '添加',
    'buttonLink' => ['create'],
]);
```

### Datagrid 数据网格

```php
use bestyii\tabler\Datagrid;

Datagrid::widget([
    'items' => [
        ['title' => '名称', 'value' => '示例'],
        ['title' => '状态', 'value' => '<span class="badge bg-success">正常</span>'],
    ],
]);
```

### DividedList 分隔列表

```php
use bestyii\tabler\DividedList;

DividedList::widget([
    'items' => [
        '<a href="#">项目一</a>',
        '<a href="#">项目二</a>',
    ],
]);
```

### Timeline 时间线

```php
use bestyii\tabler\Timeline;

Timeline::widget([
    'items' => [
        ['title' => '创建', 'body' => '用户创建了订单', 'icon' => 'plus', 'color' => 'success'],
        ['title' => '支付', 'body' => '用户完成支付', 'icon' => 'credit-card'],
    ],
]);
```

### Steps 步骤

```php
use bestyii\tabler\Steps;

Steps::widget([
    'items' => [
        ['title' => '提交', 'description' => '提交申请'],
        ['title' => '审核', 'description' => '等待审核'],
        ['title' => '完成', 'description' => '审核通过'],
    ],
    'current' => 1,
]);
```

### Tracking 追踪条

```php
use bestyii\tabler\Tracking;

Tracking::widget([
    'items' => [
        ['color' => 'success', 'tooltip' => '在线'],
        ['color' => 'warning', 'tooltip' => '忙碌'],
        ['color' => 'danger', 'tooltip' => '离线'],
    ],
]);
```

### Carousel 轮播图

```php
use bestyii\tabler\Carousel;

Carousel::widget([
    'items' => [
        ['content' => '<div class="bg-primary p-5">幻灯片 1</div>'],
        ['content' => '<div class="bg-success p-5">幻灯片 2</div>'],
    ],
]);
```

### ImageCheck 图片选择

```php
use bestyii\tabler\ImageCheck;

ImageCheck::widget([
    'name' => 'template',
    'items' => [
        ['value' => 't1', 'image' => '/img/t1.png', 'alt' => '模板1'],
        ['value' => 't2', 'image' => '/img/t2.png', 'alt' => '模板2'],
    ],
]);
```

### ColorInput 颜色选择

```php
use bestyii\tabler\ColorInput;

ColorInput::widget([
    'name' => 'color',
    'value' => 'blue',
    'items' => [
        'blue' => 'blue',
        'red' => 'red',
        'green' => 'green',
    ],
]);
```

### SelectGroup 选择组

```php
use bestyii\tabler\SelectGroup;

SelectGroup::widget([
    'name' => 'size',
    'value' => 'md',
    'items' => [
        'sm' => ['label' => '小', 'icon' => 'size-small'],
        'md' => ['label' => '中', 'icon' => 'size'],
        'lg' => ['label' => '大', 'icon' => 'size-large'],
    ],
]);
```

## 表单组件

### ActiveForm

```php
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'username', ['iconPrepend' => 'user'])->textInput();
echo $form->field($model, 'email', ['iconPrepend' => 'mail'])->textInput();
ActiveForm::end();
```

### GridView 表格

```php
use bestyii\tabler\grid\GridView;

GridView::widget([
    'dataProvider' => $dataProvider,
    'cardTitle' => '用户列表',
    'columns' => ['id', 'username', 'email:email'],
]);
```

### TomSelect 选择器

```php
use bestyii\tabler\TomSelect;

$form->field($model, 'category')->widget(TomSelect::class, [
    'items' => [1 => '分类A', 2 => '分类B'],
    'pluginOptions' => ['create' => true],
]);
```

### Litepicker 日期选择

```php
use bestyii\tabler\Litepicker;

$form->field($model, 'date')->widget(Litepicker::class, [
    'pluginOptions' => [
        'singleMode' => false,
        'format' => 'YYYY-MM-DD',
    ],
]);
```

## 使用模式

### Widget 模式
```php
WidgetClass::widget(['property' => 'value']);
```

### Container 模式
```php
WidgetClass::begin(['property' => 'value']);
echo 'content';
WidgetClass::end();
```

### 表单字段模式
```php
$form->field($model, 'attribute')->widget(WidgetClass::class, ['property' => 'value']);
```

## 常见组合

### 卡片 + 表格

```php
use bestyii\tabler\Card;
use bestyii\tabler\grid\GridView;

Card::begin(['title' => '用户管理']);

GridView::widget([
    'dataProvider' => $dataProvider,
    'renderCardHeader' => false,
    'columns' => ['id', 'username', 'email'],
]);

Card::end();
```

### 表单 + 图标输入

```php
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();

echo $form->field($model, 'email', [
    'iconPrepend' => 'mail'
])->textInput();

echo $form->field($model, 'password', [
    'iconPrepend' => 'lock'
])->passwordInput();

ActiveForm::end();
```

### 卡片 + Datagrid

```php
use bestyii\tabler\Card;
use bestyii\tabler\Datagrid;

Card::widget([
    'title' => '服务器信息',
    'content' => Datagrid::widget([
        'items' => [
            ['title' => '主机名', 'value' => 'server-01'],
            ['title' => 'IP', 'value' => '192.168.1.1'],
            ['title' => '状态', 'value' => '<span class="badge bg-success">运行中</span>'],
        ],
    ]),
]);
```
