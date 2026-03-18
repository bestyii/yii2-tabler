---
title: Chart
description: ApexCharts-based widget wrapper for analytics and readiness dashboards.
related: [Card, Progress]
status: hybrid-ready
preview: /preview-lab/uptime
mirror: /preview/uptime
source: src/Chart.php
test: tests/ChartTest.php
package: bestyii/yii2-tabler
---

# Chart

`bestyii\tabler\Chart` renders a chart container and initializes ApexCharts with declarative options.

## Demo

```php-demo
use bestyii\tabler\Chart;

echo Chart::widget([
    'series' => [
        ['name' => 'Completed', 'data' => [12, 18, 24, 30]],
    ],
    'chartOptions' => [
        'chart' => ['type' => 'line', 'height' => 180],
        'xaxis' => ['categories' => ['W1', 'W2', 'W3', 'W4']],
    ],
    'options' => ['style' => 'min-height: 180px'],
]);
```
