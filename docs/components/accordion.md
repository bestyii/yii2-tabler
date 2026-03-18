---
title: Accordion
description: Collapsible content sections using Bootstrap 5 accordion markup.
related: [Card]
status: hybrid-ready
preview: /preview-lab/faq
mirror: /preview/accordion
source: src/Accordion.php
test: tests/AccordionTest.php
package: bestyii/yii2-tabler
---

# Accordion

`bestyii\tabler\Accordion` renders a Tabler-compatible accordion for dense explanatory content.

## Demo

```php-demo
use bestyii\tabler\Accordion;

echo Accordion::widget([
    'items' => [
        ['title' => 'Navigation parity', 'content' => '<p class="mb-0">Mirror and hybrid links.</p>', 'active' => true],
        ['title' => 'Dense layouts', 'content' => '<p class="mb-0">Tables and pagination checks.</p>'],
    ],
]);
```
