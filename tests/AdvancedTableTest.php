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
    }
}
