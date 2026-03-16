<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\PageHeader;

/**
 * Tests for PageHeader widget
 */
class PageHeaderTest extends TestCase
{
    public function testNormalPageHeader()
    {
        PageHeader::$counter = 0;
        $html = PageHeader::widget([
            'title' => 'Main Title',
            'preTitle' => 'Sub Title Content',
        ]);

        $this->assertStringContainsString('class="page-header', $html);
        $this->assertStringContainsString('Main Title', $html);
        $this->assertStringContainsString('Sub Title Content', $html);
    }

    public function testPageHeaderWithBreadcrumbs()
    {
        PageHeader::$counter = 0;
        $html = PageHeader::widget([
            'title' => 'Page Title',
            'breadcrumb' => [
                'links' => [
                    ['label' => 'Home', 'url' => ['site/index']],
                    'Current',
                ],
            ],
        ]);

        $this->assertStringContainsString('class="breadcrumb"', $html);
        $this->assertStringContainsString('Home', $html);
    }

    public function testPageHeaderWithActions()
    {
        PageHeader::$counter = 0;
        $html = PageHeader::widget([
            'title' => 'With Actions',
            'actions' => [
                [
                    'label' => 'Create',
                    'url' => ['create'],
                    'icon' => 'plus',
                ],
                '<button class="btn btn-secondary">Raw Button</button>',
            ],
        ]);

        $this->assertStringContainsString('btn-list', $html);
        $this->assertStringContainsString('Create', $html);
        $this->assertStringContainsString('Raw Button', $html);
    }
}
