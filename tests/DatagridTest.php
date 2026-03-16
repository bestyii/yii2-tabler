<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Datagrid;

/**
 * Tests for Datagrid widget
 */
class DatagridTest extends TestCase
{
    public function testDatagridBasic()
    {
        Datagrid::$counter = 0;
        $html = Datagrid::widget([
            'items' => [
                ['title' => 'Label1', 'value' => 'Value1'],
                ['title' => 'Label2', 'value' => 'Value2'],
            ],
        ]);

        $this->assertStringContainsString('class="datagrid"', $html);
        $this->assertStringContainsString('datagrid-title', $html);
        $this->assertStringContainsString('Label1', $html);
        $this->assertStringContainsString('Value1', $html);
    }
}
