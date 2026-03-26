# bestyii/yii2-tabler

`bestyii/yii2-tabler` 是一个面向 Yii2 后台、运营平台和数据管理界面的 Tabler 组件包。
它不是单纯的 CSS 主题封装，而是把 Tabler 的视觉语言、常见后台部件和前端插件整合成可复用的 Yii2 Widget 与 Asset Bundle。
从产品目标上，它不应只是一个“Tabler 版补充包”，而应逐步成为 `yiisoft/yii2-bootstrap5` 的上位替代：既覆盖 Bootstrap 常用能力，也提供更丰富的后台组件和更优的视觉表达。

## 产品定位

这个包解决的是 Yii2 后台项目里最常见的三个问题：

1. 设计系统已经选定 Tabler，但团队不希望在视图里手写大量碎片化 HTML。
2. 项目需要的不只是按钮、弹窗、导航，还包括图表、地图、富文本、拖拽上传、分段导航、状态指示、时间线、运营型表格等后台高频组件。
3. 团队希望把前端插件接入、资源发布、组件文档和测试门禁，统一收敛在包级别，而不是散落在每个业务应用里。

因此，`bestyii/yii2-tabler` 的目标不是替代 Yii2 本身，而是为 Yii2 提供一层偏产品化、偏后台场景的 Tabler 组件基座，并逐步补齐 `yii2-bootstrap5` 已有的核心能力。

## 当前交付面

基于当前仓库快照，这个包已经提供：

- 62 个顶层类，覆盖 Bootstrap 常用组件、Tabler 后台组件和表单基座。
- 26 个 Asset Bundle，用于统一管理 Tabler 及其配套前端依赖。
- 59 篇组件文档，位于 `docs/components`。
- 63 个 PHPUnit 用例，覆盖 469 条断言。
- 可执行的 `phpunit`、`phpstan`、`ecs` 三条包级质量门禁。

代表性组件包括：

- Bootstrap 核心层：`ActiveForm`、`ActiveField`、`Breadcrumbs`、`ButtonDropdown`、`ButtonToolbar`、`LinkPager`、`NavBar`、`Popover`、`ToggleButtonGroup`
- 基础界面：`Button`、`Alert`、`Badge`、`Card`、`Modal`、`Offcanvas`、`Tabs`、`Toast`
- 导航与页头：`Nav`、`Dropdown`、`DropdownMenu`、`PageHeader`、`Pagination`、`NavSegmented`
- 状态与运营表达：`Status`、`StatusDot`、`StatusIndicator`、`Ribbon`、`Steps`、`Timeline`、`Tracking`、`Trending`
- 内容与后台块：`Avatar`、`AvatarList`、`EmptyState`、`Payment`、`Tag`
- 数据与交互：`Table`、`AdvancedTable`、`Range`、`Rating`
- 插件型组件：`Chart`、`Datepicker`、`Dropzone`、`Fullcalendar`、`Select`、`Signature`、`Typed`、`VectorMap`、`Wysiwyg`

## 适合什么项目

适合：

- SaaS 后台
- CRM / ERP / OA
- 数据分析与运营平台
- 需要较强视觉完成度的内部管理系统
- 已经采用 Tabler 作为统一视觉系统的 Yii2 项目

不适合：

- 只需要最基础 Bootstrap 组件的轻量页面
- 主要面向营销落地页而非后台工作台的项目
- 必须严格沿用 `yiisoft/yii2-bootstrap5` 既有命名、示例和资源层约定，不接受迁移适配的项目

## 和应用的边界

这个包当前聚焦在“组件层”和“资源层”：

- 提供 Widget、Asset Bundle、组件文档和测试
- 不内置应用级模块、站点路由或布局系统
- 不伪装成完整后台脚手架

也就是说，它更像一个可持续维护的 UI 组件包，而不是一个整站模板。

## 安装

```bash
composer require bestyii/yii2-tabler
```

当前要求：

- PHP `>=8.4`
- Yii2 `~2.0.32`

## 快速开始

### 1. 渲染一个按钮

```php
use bestyii\tabler\Button;

echo Button::primary(
    'Open Preview',
    icon: 'eye',
    url: ['/preview'],
);
```

### 2. 渲染一个标准页头

```php
use bestyii\tabler\Badge;
use bestyii\tabler\PageHeader;

echo PageHeader::widget([
    'preTitle' => 'Operations',
    'title' => 'Hybrid Validation Board',
    'content' => Badge::green('Ready', lite: true),
]);
```

对于高频场景，组件现在提供了更易写的静态 helper，例如 `Badge::secondary('Draft')`、`Button::primary('Save')`、`Alert::success('Done')`、`Progress::success(72, label: '72%')`。底层的 `::widget([...])` API 仍然保留，适合更完整的配置数组。

如果颜色或类型是在业务代码里动态算出来的，可以进一步使用类型化的 `make()`：

```php
use bestyii\tabler\Badge;
use bestyii\tabler\Button;

echo Badge::make(color: 'orange', text: 'Review queue', lite: true);
echo Button::make(color: 'danger', label: 'Delete', outline: true, icon: 'trash');
```

当前已支持语法糖的组件和预设范围如下：

- `Badge`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `Button`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `Alert`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`
- `Progress`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `Tag`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `Status`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `StatusDot`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `StatusIndicator`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `Ribbon`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `Spinner`：`border`、`grow`
- `ButtonDropdown`：`primary`、`secondary`、`success`、`info`、`warning`、`danger`、`blue`、`azure`、`indigo`、`purple`、`pink`、`red`、`orange`、`yellow`、`lime`、`green`、`teal`、`cyan`、`dark`
- `Offcanvas`：`left`、`right`、`top`、`bottom`
- `Popover`：`auto`、`top`、`bottom`、`left`、`right`

### 3. 渲染一个后台表格卡片

```php
use bestyii\tabler\AdvancedTable;

echo AdvancedTable::widget([
    'title' => 'Release backlog',
    'description' => 'Searchable table for local-first delivery lanes.',
    'searchPlaceholder' => 'Search backlog',
    'pageSize' => 10,
    'columns' => [
        ['attribute' => 'owner', 'label' => 'Owner', 'encode' => true],
        ['attribute' => 'lane', 'label' => 'Lane', 'encode' => true],
    ],
    'rows' => [
        ['owner' => 'Alice Wong', 'lane' => 'Mirror routing'],
        ['owner' => 'Ben Yu', 'lane' => 'Widget validation'],
    ],
]);
```

## 资源策略

`bestyii/yii2-tabler` 采用的是“组件 + 资源包”双层模型：

- `TablerAsset` 负责注册 Tabler 核心样式与脚本
- 插件组件各自依赖对应 Asset Bundle，例如 `ApexChartsAsset`、`DropzoneAsset`、`FullcalendarAsset`
- 包内统一处理资源路径、发布行为和依赖声明，业务应用只关心 Widget 调用

这让项目可以在保留 Yii2 视图体系的同时，把前端插件接入成本控制在组件包内部。

## 产品目标

从长期方向看，`bestyii/yii2-tabler` 应该满足两层目标：

- 第一层，用 Tabler 风格完整承接 `yii2-bootstrap5` 的核心用户态组件能力。当前这一层已经覆盖到 `ActiveForm`、`ActiveField`、`NavBar`、`ButtonDropdown`、`ButtonToolbar`、`LinkPager`、`Popover`、`ToggleButtonGroup` 等高频部件。
- 第二层，在此基础上继续提供 `Card`、`PageHeader`、`AdvancedTable`、`Chart`、`Dropzone`、`VectorMap`、`Wysiwyg` 等更偏后台产品场景的组件。

换句话说，`yii2-tabler` 的定位不是“和 `yii2-bootstrap5` 做功能切分”，而是“以 Tabler 风格重做并扩展 Yii2 的 Bootstrap 组件层”。

## 质量与可维护性

当前包级交付标准包括：

- 组件文档与源码同仓维护
- PHPUnit 验证渲染结果与资产发布
- PHPStan 验证静态分析
- ECS 保持代码风格一致

最近一次补强还加入了 Asset Bundle 一致性测试，用于直接检查：

- `sourcePath` 是否有效
- 本地资源文件是否真实存在
- 资源是否能被 Yii 的 AssetManager 正常发布

这类测试的目的，是避免“组件渲染测试通过，但前端资源实际上不可发布”的隐性回归。

## 文档入口

- 包级文档索引：[`docs/index.md`](docs/index.md)
- 组件文档目录：[`docs/components`](docs/components)
- 选型参考：[`docs/compare-with-yii2-bootstrap5.md`](docs/compare-with-yii2-bootstrap5.md)

## 选型结论

从产品方向上，`bestyii/yii2-tabler` 应该是 `yiisoft/yii2-bootstrap5` 的超集，而不是平行替代。

当前如果你的项目目标是“用 Tabler 风格统一后台界面，并把 Bootstrap 常用基础能力也收进同一个组件层”，`bestyii/yii2-tabler` 已经可以作为主包承接。更细的覆盖矩阵与选型参考，见 [`docs/compare-with-yii2-bootstrap5.md`](docs/compare-with-yii2-bootstrap5.md)。
