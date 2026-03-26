<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\AdvancedTable;

class AdvancedTableTest extends TestCase
{
    public function testAdvancedTableRendersSearchAndRegistersListJs(): void
    {
        $html = AdvancedTable::widget([
            'title' => 'Advanced backlog grid',
            'description' => 'Dense validation table',
            'searchPlaceholder' => 'Search backlog',
            'columns' => [
                [
                    'attribute' => 'owner',
                    'label' => 'Owner',
                    'encode' => true,
                ],
                [
                    'attribute' => 'lane',
                    'label' => 'Lane',
                    'encode' => true,
                ],
            ],
            'rows' => [
                [
                    'owner' => 'Alice Wong',
                    'lane' => 'Mirror routing',
                ],
                [
                    'owner' => 'Ben Yu',
                    'lane' => 'Hybrid dashboard',
                ],
            ],
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('Advanced backlog grid', $html);
        $this->assertStringContainsString('Search backlog', $html);
        $this->assertStringContainsString('table-sort', $html);
        $this->assertStringContainsString('new List', $scripts);
        $this->assertXPathExists('//div[contains(@class, "card-header")]//h3[text()="Advanced backlog grid"]', $html);
    }

    public function testAdvancedTableDefaultsToSafeTextFormat(): void
    {
        $html = AdvancedTable::widget([
            'title' => 'Escaped table',
            'columns' => [
                [
                    'attribute' => 'owner',
                    'label' => 'Owner',
                ],
            ],
            'rows' => [
                [
                    'owner' => '<script>alert(1)</script>',
                ],
            ],
        ]);

        $this->assertStringContainsString('&lt;script&gt;alert(1)&lt;/script&gt;', $html);
        $this->assertXPathCount(0, '//script', $html);
    }

    public function testAdvancedTableSupportsExplicitHtmlFormat(): void
    {
        $html = AdvancedTable::widget([
            'title' => 'Release status',
            'columns' => [
                [
                    'label' => 'Status',
                    'content' => static fn(): string => '<span class="badge bg-green">Ready</span>',
                    'format' => AdvancedTable::FORMAT_HTML,
                ],
            ],
            'rows' => [
                [
                    'status' => 'Ready',
                ],
            ],
        ]);

        $this->assertXPathExists('//tbody//span[contains(@class, "badge") and text()="Ready"]', $html);
    }

    public function testAdvancedTableRendersEmptyStateForMissingRows(): void
    {
        $html = AdvancedTable::widget([
            'title' => 'Release status',
            'columns' => [
                [
                    'attribute' => 'owner',
                    'label' => 'Owner',
                ],
            ],
            'rows' => [],
        ]);

        $this->assertXPathExists('//tbody/tr/td[contains(@class, "text-secondary") and text()="No data available."]', $html);
    }
}
