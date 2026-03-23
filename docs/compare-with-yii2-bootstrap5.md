---
title: Compare With yii2-bootstrap5
description: Product and component comparison between bestyii/yii2-tabler and yiisoft/yii2-bootstrap5.
status: reference
source: docs/compare-with-yii2-bootstrap5.md
package: bestyii/yii2-tabler
---

# 与 `yiisoft/yii2-bootstrap5` 的对比

这份对比不再只是讨论“未来要不要补齐”。
基于当前仓库快照，`bestyii/yii2-tabler` 已经把 `yii2-bootstrap5` 最关键的一批用户态组件补进来了，并继续保留 Tabler 自己更强的后台产品组件层。

## 一眼判断表

| 你的目标 | 当前建议 | 参考说明 |
| --- | --- | --- |
| 要 Bootstrap 常用组件 + 更完整后台 UI | `bestyii/yii2-tabler` | 现在已经覆盖核心用户态 Bootstrap Widget |
| 要 Tabler 风格后台工作台 | `bestyii/yii2-tabler` | 这是它的直接优势区 |
| 只做基础表单、导航、弹窗页面 | `bestyii/yii2-tabler` | 这部分已经不再必须回退到 `yii2-bootstrap5` |
| 需要图表、上传、富文本、地图、运营表格 | `bestyii/yii2-tabler` | `yii2-bootstrap5` 没有这一层 |
| 团队必须完全沿用官方 Bootstrap 5 示例和资源命名 | `yiisoft/yii2-bootstrap5` 可继续作为参考 | 这属于迁移习惯问题，不是组件缺口问题 |
| 希望单包承接后台主站长期演进 | `bestyii/yii2-tabler` | 更符合“超集包”方向 |

## 当前仓库快照

| 指标 | `bestyii/yii2-tabler` |
| --- | --- |
| 顶层类 | 62 |
| Asset Bundle | 27 |
| 组件文档 | 59 |
| PHPUnit 用例 | 63 |
| Assertions | 469 |

## 核心用户态组件覆盖

| 组件 | `bestyii/yii2-tabler` | `yiisoft/yii2-bootstrap5` | 说明 |
| --- | --- | --- | --- |
| `Accordion` | Yes | Yes | 已覆盖 |
| `ActiveField` | Yes | Yes | 已补齐 Tabler 风格字段渲染 |
| `ActiveForm` | Yes | Yes | 已补齐 |
| `Alert` | Yes | Yes | 已覆盖 |
| `Breadcrumbs` | Yes | Yes | 通过 `Breadcrumbs` 兼容类承接 |
| `Button` | Yes | Yes | 已覆盖 |
| `ButtonDropdown` | Yes | Yes | 已补齐 |
| `ButtonGroup` | Yes | Yes | 已覆盖 |
| `ButtonToolbar` | Yes | Yes | 已补齐 |
| `Carousel` | Yes | Yes | 已覆盖 |
| `Dropdown` | Yes | Yes | 已覆盖 |
| `InputWidget` | Yes | Yes | 已提供基座类 |
| `LinkPager` | Yes | Yes | 已补齐，与现有 `Pagination` 并存 |
| `Modal` | Yes | Yes | 已覆盖 |
| `Nav` | Yes | Yes | 已覆盖 |
| `NavBar` | Yes | Yes | 已补齐 |
| `Offcanvas` | Yes | Yes | 已覆盖 |
| `Popover` | Yes | Yes | 已补齐 |
| `Progress` | Yes | Yes | 已覆盖 |
| `Tabs` | Yes | Yes | 已覆盖 |
| `Toast` | Yes | Yes | 已覆盖 |
| `ToggleButtonGroup` | Yes | Yes | 已补齐 |

## `bestyii/yii2-tabler` 额外提供的价值

| 后台组件/能力 | `bestyii/yii2-tabler` | `yiisoft/yii2-bootstrap5` |
| --- | --- | --- |
| `Card` | Yes | No |
| `PageHeader` | Yes | No |
| `EmptyState` | Yes | No |
| `Avatar` / `AvatarList` | Yes | No |
| `Badge` | Yes | No |
| `Status` / `StatusDot` / `StatusIndicator` | Yes | No |
| `Ribbon` / `Steps` / `Timeline` / `Tracking` / `Trending` | Yes | No |
| `Payment` / `Tag` / `NavSegmented` | Yes | No |
| `Table` / `AdvancedTable` | Yes | No |
| `Chart` / `VectorMap` | Yes | No |
| `Dropzone` / `Signature` / `Wysiwyg` | Yes | No |
| `Datepicker` / `Select` / `Range` / `Rating` | Yes | No |

## 表单与数据流能力

| 能力层 | `bestyii/yii2-tabler` | `yiisoft/yii2-bootstrap5` | 产品判断 |
| --- | --- | --- | --- |
| 表单壳层 | `ActiveForm` / `ActiveField` | `ActiveForm` / `ActiveField` | 基础表单能力现在两者都具备 |
| 表单基座 | `InputWidget` | `InputWidget` | 可继续承接 ActiveField widget 化用法 |
| 选择与范围增强 | `Select` / `Range` / `Rating` / `Datepicker` | 无直接对应 | Tabler 层更丰富 |
| Toggle 组 | `ToggleButtonGroup` | `ToggleButtonGroup` | 已补齐 |
| 分页 | `Pagination` + `LinkPager` | `LinkPager` | `yii2-tabler` 同时保留产品型分页和标准分页 |

## 资源策略差异

| 维度 | `bestyii/yii2-tabler` | `yiisoft/yii2-bootstrap5` |
| --- | --- | --- |
| 基础样式 | `tabler.min.css` + `tabler-vendors.min.css` | `bootstrap.css` |
| 基础脚本 | `tabler.min.js` | `bootstrap.bundle.js` |
| 图标资源 | `TablerIconsAsset` | `BootstrapIconAsset` |
| 资源入口命名 | 统一走 Tabler 体系 | 统一走 Bootstrap 体系 |
| 插件资源 | 大量单独 Asset Bundle | 主要围绕 Bootstrap 官方插件 |

这里的差异是“资源体系设计不同”，不是“组件能力缺失”。
`bestyii/yii2-tabler` 的目标不是复制一套 `BootstrapAsset` 命名，而是用 Tabler 的资源层承接同一批页面能力。

## 选择建议表

| 你的项目状态 | 建议 |
| --- | --- |
| 新建后台、CRM、运营平台、数据面板 | 直接使用 `bestyii/yii2-tabler` |
| 旧项目已经大量使用 `yii2-bootstrap5`，但想切到 Tabler 风格 | 可逐步迁移到 `bestyii/yii2-tabler`，核心用户态组件已具备承接条件 |
| 只把 `yii2-bootstrap5` 当 Bootstrap 官方说明书来参考 | 继续参考官方包即可 |
| 希望单包覆盖 Bootstrap 基础组件 + Tabler 后台增强组件 | 选 `bestyii/yii2-tabler` |

## 最终判断

从当前代码快照看，`bestyii/yii2-tabler` 已经不再只是“Tabler 风格补充包”。
在核心用户态组件层，它已经具备了 `yii2-bootstrap5` 的主要覆盖面；在后台产品组件层，它明显更丰富。

因此更准确的判断是：

| 结论 | 说明 |
| --- | --- |
| `yii2-bootstrap5` 是参考基线 | 它定义了 Yii2 世界里 Bootstrap 组件的经典映射方式 |
| `yii2-tabler` 是更适合后台产品的主包方向 | 它现在已经覆盖核心用户态组件，并额外提供更强的 Tabler 后台组件层 |
| 两者关系应理解为“超集”而不是“并列替代” | 这也是 `bestyii/yii2-tabler` 更合理的产品定位 |
