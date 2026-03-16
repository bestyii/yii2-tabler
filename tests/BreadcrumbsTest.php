<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Breadcrumbs;

/**
 * Tests for Breadcrumbs widget
 */
class BreadcrumbsTest extends TestCase
{
    public function testNormalBreadcrumbs()
    {
        Breadcrumbs::$counter = 0;
        $html = Breadcrumbs::widget([
            'links' => [
                ['label' => 'Level 1', 'url' => ['site/index']],
                'Level 2',
            ],
        ]);

        $this->assertStringContainsString('<ol id="w0" class="breadcrumb">', $html);
        $this->assertStringContainsString('Level 1', $html);
        $this->assertStringContainsString('Level 2', $html);
    }
}
