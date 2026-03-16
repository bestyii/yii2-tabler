# Yii2 Tabler Extension

This is the Tabler UI framework extension for Yii 2.0 PHP Framework. It encapsulates Tabler components and provides widgets to easily integrate Tabler into your Yii2 application.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer require bestyii/yii2-tabler
```

or add

```json
"bestyii/yii2-tabler": "~1.0"
```

to the `require` section of your `composer.json` file.

## Usage

### Layout Integration

To use the Tabler layout, you can point your controller's layout property to the provided layouts:

```php
public $layout = '@bestyii/tabler/views/layouts/main';
```

Or for authentication pages (login/register):

```php
public $layout = '@bestyii/tabler/views/layouts/auth';
```

### Preview & Demo

The extension includes a comprehensive preview system that replicates the official Tabler UI demo with 88 pages across 9 categories. To enable it, register the Tabler module in your application config:

```php
'modules' => [
    'tabler' => [
        'class' => 'bestyii\tabler\Module',
    ],
],
```

Available categories:

- **Home** (`/tabler/default/index`) — Dashboard overview
- **Interface** (`/tabler/interface/*`) — 26 UI component demos (alerts, avatars, badges, buttons, cards, carousel, etc.)
- **Form** (`/tabler/form/*`) — Form elements & form layout
- **Extra** (`/tabler/extra/*`) — 29 pages (activity, chat, email-inbox, gallery, invoice, settings, users, etc.)
- **Page** (`/tabler/page/*`) — Error pages, profile, FAQ, pricing table, cards masonry
- **Layout** (`/tabler/layout/*`) — Horizontal layout, page headers
- **Plugin** (`/tabler/plugin/*`) — 14 plugin demos (charts, datatables, dropzone, fullcalendar, maps, etc.)
- **Addon** (`/tabler/addon/*`) — Icons, emails, flags, illustrations, payment providers
- **Help** (`/tabler/help/changelog`) — Changelog

## Credits

### Widgets

This extension provides several convenient widgets.

#### Card

```php
use bestyii\tabler\Card;
use bestyii\tabler\Html;

Card::begin([
    'title' => 'User Profile',
    'subtitle' => 'Basic information',
    'statusColor' => 'primary',
    'tools' => Html::a('Edit', ['edit'], ['class' => 'btn btn-primary btn-sm'])
]);

echo "Card content goes here.";

Card::end();
```

#### EmptyState

```php
use bestyii\tabler\EmptyState;

echo EmptyState::widget([
    'title' => 'No results found',
    'subtitle' => 'Try adjusting your search criteria.',
    'icon' => 'search',
    'buttonText' => 'Clear Filters',
    'buttonLink' => ['index'],
]);
```

#### ActiveForm

You can use Tabler styled forms with features like prepend/append icons:

```php
use bestyii\tabler\ActiveForm;

$form = ActiveForm::begin();

echo $form->field($model, 'username', [
    'iconPrepend' => 'user'
])->textInput();

ActiveForm::end();
```

#### GridView

The custom GridView automatically creates the layout wrapper designed for tabler `card-table`.

```php
use bestyii\tabler\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'renderCardHeader' => true,
    'cardTitle' => 'Users List',
    'columns' => [
        'id',
        'username',
        'email:email',
    ],
]);
```

### Icons

Use the Html helper block to quickly render tabler svg icons.

```php
use bestyii\tabler\Html;

echo Html::icon('home');
```

### Advanced Components

The extension also includes the following advanced components out-of-the-box:

- **Alert**: `bestyii\tabler\Alert`
- **Accordion**: `bestyii\tabler\Accordion`
- **Avatar**: `bestyii\tabler\Avatar`
- **Badge**: `bestyii\tabler\Badge`
- **Breadcrumbs**: `bestyii\tabler\Breadcrumbs`
- **Carousel**: `bestyii\tabler\Carousel`
- **ColorInput**: `bestyii\tabler\ColorInput`
- **Datagrid**: `bestyii\tabler\Datagrid`
- **Divider**: `bestyii\tabler\Divider`
- **ImageCheck**: `bestyii\tabler\ImageCheck`
- **Modal**: `bestyii\tabler\Modal`
- **Offcanvas**: `bestyii\tabler\Offcanvas`
- **Progress**: `bestyii\tabler\Progress`
- **Ribbon**: `bestyii\tabler\Ribbon`
- **PageHeader**: `bestyii\tabler\PageHeader`
- **SelectGroup**: `bestyii\tabler\SelectGroup`
- **Skeleton**: `bestyii\tabler\Skeleton`
- **Spinner**: `bestyii\tabler\Spinner`
- **Status**: `bestyii\tabler\Status`
- **Steps**: `bestyii\tabler\Steps`
- **Tabs**: `bestyii\tabler\Tabs`
- **Timeline**: `bestyii\tabler\Timeline`
- **Toast**: `bestyii\tabler\Toast`
- **Tracking**: `bestyii\tabler\Tracking`

### Navigation & Dropdowns

- **Nav**: `bestyii\tabler\Nav`
- **Dropdown**: `bestyii\tabler\Dropdown`

### Advanced Form Plugins

- **TomSelect (Select Enhancement)**: `bestyii\tabler\TomSelect`
- **Litepicker (Date Picker)**: `bestyii\tabler\Litepicker`

#### Usage Example for Form Plugins

```php
use bestyii\tabler\ActiveForm;
use bestyii\tabler\TomSelect;
use bestyii\tabler\Litepicker;

$form = ActiveForm::begin();

// TomSelect
echo $form->field($model, 'category_id')->widget(TomSelect::class, [
    'items' => [1 => 'Category A', 2 => 'Category B'],
    'pluginOptions' => [
        'create' => true,
        'sortField' => ['field' => 'text', 'direction' => 'asc']
    ]
]);

// Litepicker
echo $form->field($model, 'published_date')->widget(Litepicker::class, [
    'pluginOptions' => [
        'format' => 'YYYY-MM-DD',
        'singleMode' => true,
    ]
]);

ActiveForm::end();
```
