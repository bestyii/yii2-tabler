<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Breadcrumb;

class BreadcrumbTest extends TestCase
{
    public function testBreadcrumbRendersLinksActiveItemAndIcon(): void
    {
        $html = Breadcrumb::widget([
            'items' => [
                ['label' => 'Dashboard', 'url' => '/dashboard', 'icon' => 'layout-dashboard'],
                ['label' => 'Tables', 'active' => true],
            ],
        ]);

        $this->assertStringContainsString('aria-label="breadcrumb"', $html);
        $this->assertStringContainsString('class="breadcrumb"', $html);
        $this->assertStringContainsString('breadcrumb-item', $html);
        $this->assertStringContainsString('ti-layout-dashboard', $html);
        $this->assertStringContainsString('breadcrumb-item active', $html);
    }
}
