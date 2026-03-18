---
title: EmptyState
description: Empty-state helper for no-results, no-data and nothing-to-configure screens.
related: [Button, Icon]
status: hybrid-ready
preview: /preview-lab/profile
mirror: /preview/empty
source: src/EmptyState.php
test: tests/EmptyStateTest.php
package: bestyii/yii2-tabler
---

# EmptyState

`bestyii\tabler\EmptyState` keeps empty layouts inside the widget layer instead of scattering HTML fragments across pages.

## Demo

```php-demo
use bestyii\tabler\EmptyState;

echo EmptyState::widget([
    'title' => 'No archived mirrors',
    'subtitle' => 'Archive pages will appear here once the first remote sync is enabled.',
    'buttonLabel' => 'Open preview board',
    'buttonUrl' => '/preview-lab/board',
]);
```
