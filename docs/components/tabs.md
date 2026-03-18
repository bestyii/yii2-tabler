---
title: Tabs
description: Bootstrap 5 / Tabler tabs widget for section switching.
related: [Nav, Card]
status: hybrid-ready
preview: /preview-lab/cards
mirror: /preview/tabs
source: src/Tabs.php
test: tests/TabsTest.php
package: bestyii/yii2-tabler
---

# Tabs

`bestyii\tabler\Tabs` renders Tabler tabs with pane content and active state handling.

## Demo

```php-demo
use bestyii\tabler\Tabs;

echo Tabs::widget([
    'items' => [
        ['label' => 'Overview', 'content' => '<p class="mb-0">Overview panel</p>', 'active' => true],
        ['label' => 'Activity', 'content' => '<p class="mb-0">Activity panel</p>'],
    ],
]);
```
