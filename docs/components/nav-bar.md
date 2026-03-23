---
title: NavBar
description: Top navigation container for Tabler headers with brand, toggle and collapse regions.
related: [Nav, Offcanvas]
status: hybrid-ready
preview: /preview-lab/navigation
mirror: /preview/navigation
source: src/NavBar.php
test: tests/NavBarTest.php
package: bestyii/yii2-tabler
---

# NavBar

`bestyii\tabler\NavBar` renders a Tabler-compatible top navbar and can host `Nav` items inside its collapse area.

## Demo

```php-demo
use bestyii\tabler\Nav;
use bestyii\tabler\NavBar;

ob_start();
NavBar::begin([
    'brandLabel' => 'BestYii',
    'brandUrl' => ['/site/index'],
]);
echo Nav::widget([
    'items' => [
        ['label' => 'Dashboard', 'url' => ['/site/index'], 'active' => true],
        ['label' => 'Settings', 'url' => ['/site/settings']],
    ],
]);
NavBar::end();

echo ob_get_clean();
```
