# Yii2 组件封装指南 (Widget Skills)

本文档基于 `yiisoft/yii2-bootstrap5` 的深度分析，提炼出一套用于 Yii2 环境下高质量封装前端组件的工程实践指南。

## 1. 核心设计模式

### 1.1 基础结构
推荐采用 **"基类 + Trait"** 的结构，以实现代码的最大化复用。

- **Widget 基类**: 继承 `\yii\base\Widget`，负责定义公共属性（如 `options`）。
- **Component Trait**: 包含通用的资源注册、JS 插件初始化逻辑。

### 1.2 属性规范
组件属性应严格区分用途：
- `$options`: 容器 HTML 属性（class, id, style 等）。
- `$clientOptions`: 传递给前端 JS 插件的配置参数。
- `$clientEvents`: 前端插件的事件监听器映射。

---

## 2. 工程化实践

### 2.1 样式平滑合并
**不要直接赋值 class**，应使用 `Html::addCssClass`。
```php
protected function initOptions(): void
{
    // 合并基础样式，而不覆盖用户通过 widget(['options' => ...]) 传入的样式
    Html::addCssClass($this->options, ['widget' => 'alert']);
    
    if ($this->closeButton !== false) {
        Html::addCssClass($this->options, ['toggle' => 'alert-dismissible']);
    }
}
```

### 2.2 嵌套内容支持 (begin/end)
如果组件需要包裹其它 HTML，应利用 PHP 输出缓冲。
```php
public function init(): void
{
    parent::init();
    $this->initOptions();
    ob_start(); // 开启缓冲
    echo Html::beginTag('div', $this->options);
}

public function run(): string
{
    $content = ob_get_clean(); // 获取 begin() 和 end() 之间的内容
    $content .= $this->renderBody();
    $content .= Html::endTag('div');
    
    $this->registerPlugin(); // 注册 JS
    return $content;
}
```

### 2.3 JS 插件自动化注册
在 Trait 中封装插件注册逻辑，确保资源仅在需要时加载且 ID 绑定正确。
```php
protected function registerPlugin(string $name): void
{
    $view = $this->getView();
    MyAsset::register($view); // 注册资源包
    
    $id = $this->options['id'];
    $options = empty($this->clientOptions) ? '{}' : Json::htmlEncode($this->clientOptions);
    
    // 初始化 JS
    $view->registerJs("(new myComponent('#$id', $options));");
    
    // 绑定事件
    if (!empty($this->clientEvents)) {
        foreach ($this->clientEvents as $event => $handler) {
            $view->registerJs("document.getElementById('$id').addEventListener('$event', $handler);");
        }
    }
}
```

---

## 3. 开发检查清单 (Checklist)

1.  **ID 自动生成**: 在 `init()` 中检查 `$this->options['id']`，若无则使用 `$this->getId()`。
2.  **语义化 HTML**: 优先使用 `yii\helpers\Html` 提供的工具函数。
3.  **单元隔离**: 组件的 CSS 应当是自包含的，或者依赖明确的 AssetBundle。
4.  **配置驱动**: 复杂的内部子组件（如 Close Button）应提供 `false` 选项来禁用渲染。
5.  **国际化**: 使用 `Yii::t()` 处理交互文字（如 "Close", "Confirm"）。

---

## 4. 示例：Tabler 卡片组件封装

```php
namespace app\widgets;

use yii\bootstrap5\Html;
use yii\bootstrap5\Widget;

class Card extends Widget
{
    public $title;
    public $headerOptions = [];
    
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'card');
        Html::addCssClass($this->headerOptions, 'card-header');
        ob_start();
    }
    
    public function run()
    {
        $body = ob_get_clean();
        
        $header = '';
        if ($this->title) {
            $header = Html::tag('div', 
                Html::tag('h3', $this->title, ['class' => 'card-title']), 
                $this->headerOptions
            );
        }
        
        return Html::tag('div', 
            $header . Html::tag('div', $body, ['class' => 'card-body']), 
            $this->options
        );
    }
}
```
