# Tabler Widget Mapping Documentation

本文档提供官方 Tabler UI 组件、`yii2-tabler` 扩展实现以及 `yii2-bootstrap5` 标准实现之间的映射对照表，旨在分析组件覆盖度及实现差异。

## 基础组件 (Base & Layout)

| 官方组件      | Yii2 实现 (yii2-tabler)      | BS5 对应实现 (yii2-bootstrap5) | 说明                                |
| :------------ | :--------------------------- | :----------------------------- | :---------------------------------- |
| `Avatar`      | `bestyii\tabler\Avatar`      | -                              | Tabler 专属增强                     |
| `Badge`       | `bestyii\tabler\Badge`       | - (Html Helper)                | BS5 仅提供 CSS 类                   |
| `Breadcrumb`  | `bestyii\tabler\Breadcrumbs` | `yii\bootstrap5\Breadcrumbs`   | Tabler 样式优化                     |
| `Button`      | `bestyii\tabler\Button`      | `yii\bootstrap5\Button`        | 支持 Tabler 颜色及图标              |
| `Card`        | `bestyii\tabler\Card`        | -                              | Tabler 核心组件 (BS5 无对应 Widget) |
| `Divider`     | `bestyii\tabler\Divider`     | -                              | 分隔线装饰                          |
| `Icon`        | `bestyii\tabler\Icon`        | -                              | 支持 Tabler 字体/SVG 图标           |
| `Page Header` | `bestyii\tabler\PageHeader`  | -                              | Tabler 布局核心                     |
| `Ribbon`      | `bestyii\tabler\Ribbon`      | -                              | 丝带装饰效果                        |
| `Skeleton`    | `bestyii\tabler\Skeleton`    | - (Placeholders CSS)           | 骨架屏加载效果                      |
| `Spinner`     | `bestyii\tabler\Spinner`     | - (Spinners CSS)               | 加载动画                            |
| `Status Dot`  | `bestyii\tabler\StatusDot`   | -                              | 状态提示圆点                        |
| `Status`      | `bestyii\tabler\Status`      | -                              | 状态展示条                          |
| `Typography`  | -                            | -                              | 均通过标准 Html 实现                |

## 交互组件 (Components)

| 官方组件      | Yii2 实现 (yii2-tabler)     | BS5 对应实现 (yii2-bootstrap5) | 说明                       |
| :------------ | :-------------------------- | :----------------------------- | :------------------------- |
| `Accordion`   | `bestyii\tabler\Accordion`  | `yii\bootstrap5\Accordion`     | 手风琴折叠                 |
| `Alert`       | `bestyii\tabler\Alert`      | `yii\bootstrap5\Alert`         | 警告浮动框                 |
| `Carousel`    | `bestyii\tabler\Carousel`   | `yii\bootstrap5\Carousel`      | 轮播图                     |
| `Datagrid`    | `bestyii\tabler\Datagrid`   | -                              | 数据网格展板 (Tabler 特有) |
| `Dropdown`    | `bestyii\tabler\Dropdown`   | `yii\bootstrap5\Dropdown`      | 下拉菜单                   |
| `Empty State` | `bestyii\tabler\EmptyState` | -                              | 空状态缺省页               |
| `Modals`      | `bestyii\tabler\Modal`      | `yii\bootstrap5\Modal`         | 模态对话框                 |
| `Nav`         | `bestyii\tabler\Nav`        | `yii\bootstrap5\Nav`           | 导航菜单                   |
| `Offcanvas`   | `bestyii\tabler\Offcanvas`  | `yii\bootstrap5\Offcanvas`     | 侧边抽屉面板               |
| `Pagination`  | `bestyii\tabler\LinkPager`  | `yii\bootstrap5\LinkPager`     | 分页器                     |
| `Progress`    | `bestyii\tabler\Progress`   | `yii\bootstrap5\Progress`      | 进度条                     |
| `Steps`       | `bestyii\tabler\Steps`      | -                              | 分步引导过程               |
| `Tabs`        | `bestyii\tabler\Tabs`       | `yii\bootstrap5\Tabs`          | 标签页切换                 |
| `Timeline`    | `bestyii\tabler\Timeline`   | -                              | 时间轴/操作日志            |
| `Toast`       | `bestyii\tabler\Toast`      | `yii\bootstrap5\Toast`         | 通知弹窗                   |
| `Tracking`    | `bestyii\tabler\Tracking`   | -                              | 活动状态追踪               |

## 表单组件 (Forms)

| 官方组件        | Yii2 实现 (yii2-tabler)      | BS5 对应实现 (yii2-bootstrap5) | 说明               |
| :-------------- | :--------------------------- | :----------------------------- | :----------------- |
| `Form Elements` | `bestyii\tabler\ActiveField` | `yii\bootstrap5\ActiveField`   | 样式增强及布局适配 |
| `Color Input`   | `bestyii\tabler\ColorInput`  | -                              | 颜色选择字段       |
| `Image Check`   | `bestyii\tabler\ImageCheck`  | -                              | 图片复选布局       |
| `Select Group`  | `bestyii\tabler\SelectGroup` | -                              | 按钮组式选择       |
| `Litepicker`    | `bestyii\tabler\Litepicker`  | -                              | 日期插件集成       |
| `Tom Select`    | `bestyii\tabler\TomSelect`   | -                              | 增强下拉插件集成   |

## 数据网格 (Grid)

| 官方组件     | Yii2 实现 (yii2-tabler)        | BS5 对应实现 (yii2-bootstrap5) | 说明                    |
| :----------- | :----------------------------- | :----------------------------- | :---------------------- |
| `Table`      | `bestyii\tabler\grid\GridView` | `yii\grid\GridView`            | 核心表格实现            |
| `Datatables` | `bestyii\tabler\grid\GridView` | -                              | Tabler 风格的数据分析表 |

---

## 内部辅助组件 (Internal)

| 类名            | Yii2 实现                        | BS5 对应                    | 说明                   |
| :-------------- | :------------------------------- | :-------------------------- | :--------------------- |
| `DividedList`   | `bestyii\tabler\DividedList.php` | -                           | 列表分隔布局           |
| `Tag`           | `bestyii\tabler\Tag.php`         | -                           | Tabler 特有的 Tag 标签 |
| `AvatarList`    | `bestyii\tabler\AvatarList.php`  | -                           | 头像堆叠列表           |
| `Widget (Base)` | `bestyii\tabler\Widget.php`      | `yii\bootstrap5\Widget`     | 基础类继承             |
| `ActiveForm`    | `bestyii\tabler\ActiveForm.php`  | `yii\bootstrap5\ActiveForm` | 表单配置增强           |
