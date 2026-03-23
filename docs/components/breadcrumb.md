---
title: Breadcrumb
description: Hierarchical path navigation for pages and workflows.
related: [Nav, Icon]
status: hybrid-ready
preview: /preview-lab/navigation
mirror: /preview/navigation
source: src/Breadcrumb.php
test: tests/BreadcrumbTest.php
package: bestyii/yii2-tabler
---

# Breadcrumb

`bestyii\tabler\Breadcrumb` renders a Bootstrap 5 / Tabler breadcrumb trail with optional icons and active items.
If you are migrating from `yii2-bootstrap5`, the package also exposes `bestyii\tabler\Breadcrumbs` as a compatibility alias.

## Demo

```php-demo
use bestyii\tabler\Breadcrumb;

echo Breadcrumb::widget([
    'items' => [
        ['label' => 'Workspace', 'url' => '#', 'icon' => 'briefcase'],
        ['label' => 'Tables', 'active' => true],
    ],
]);
```
