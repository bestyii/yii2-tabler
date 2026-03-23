<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Table;

class TableTest extends TestCase
{
    public function testTableRendersResponsiveStripedMarkup(): void
    {
        $html = Table::widget([
            'striped' => true,
            'cardTable' => true,
            'rows' => [
                [
                    'owner' => 'Alice',
                    'status' => 'Ready',
                ],
            ],
            'columns' => [
                [
                    'attribute' => 'owner',
                    'label' => 'Owner',
                    'rowHeader' => true,
                    'encode' => true,
                ],
                [
                    'attribute' => 'status',
                    'label' => 'Status',
                    'encode' => true,
                ],
            ],
        ]);

        $this->assertStringContainsString('table-responsive', $html);
        $this->assertStringContainsString('table table-vcenter table-striped card-table', $html);
        $this->assertStringContainsString('<th scope="row">Alice</th>', $html);
        $this->assertStringContainsString('<td>Ready</td>', $html);
    }
}
