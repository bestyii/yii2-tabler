<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\PageHeader;

class PageHeaderTest extends TestCase
{
    public function testPageHeaderRendersPretitleTitleAndContent(): void
    {
        $html = PageHeader::widget([
            'preTitle' => 'Hybrid Validation',
            'title' => 'Dashboard',
            'content' => '<span class="badge">Ready</span>',
        ]);

        $this->assertStringContainsString('page-header', $html);
        $this->assertStringContainsString('page-pretitle', $html);
        $this->assertStringContainsString('Hybrid Validation', $html);
        $this->assertStringContainsString('page-title', $html);
        $this->assertStringContainsString('Dashboard', $html);
        $this->assertStringContainsString('<span class="badge">Ready</span>', $html);
    }
}
