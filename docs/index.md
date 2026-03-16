---
title: Yii2 Tabler Widgets 文档
description: Yii2 Tabler UI 组件库使用文档，包含所有 Widget 的使用示例和 API 参考
---

## 欢迎使用 Yii2 Tabler Widgets

这是 Yii2 Tabler 扩展的组件文档，包含所有封装好的 Widget 使用方法。

### 特点

- 基于 Tabler UI 框架的 Yii2 Widget 封装
- 实时预览效果
- 完整的代码示例
- AI 友好的结构化文档

### 快速开始

#### 安装

```bash
composer require bestyii/yii2-tabler
```

#### 基础配置

在应用配置中注册模块：

```php
'modules' => [
    'tabler' => [
        'class' => 'bestyii\tabler\Module',
    ],
],
```

#### 使用 Widget

```php
use bestyii\tabler\Badge;

echo Badge::widget([
    'text' => 'New',
    'color' => 'primary',
]);
```

### 组件分类

#### 基础组件

常用的 UI 组件，如徽章、按钮、卡片等。

- [Badge 徽章](components/badge.md) - 标签、状态指示
- [Button 按钮](components/button.md) - 各类按钮样式
- [Card 卡片](components/card.md) - 内容容器
- [Alert 警告](components/alert.md) - 消息提示

#### 导航组件

- [Tabs 标签页](components/tabs.md) - 内容切换
- [Accordion 手风琴](components/accordion.md) - 折叠面板
- [Breadcrumbs 面包屑](components/breadcrumbs.md) - 路径导航

#### 反馈组件

- [Toast 消息提示](components/toast.md) - 轻量级通知
- [Modal 模态框](components/modal.md) - 对话框
- [Progress 进度条](components/progress.md) - 进度展示
- [Spinner 加载中](components/spinner.md) - 加载状态

#### 表单组件

- [ActiveForm 表单](forms/active-form.md) - 表单容器
- [TomSelect 选择器](forms/tom-select.md) - 增强选择框
- [Litepicker 日期选择](forms/litepicker.md) - 日期范围选择
