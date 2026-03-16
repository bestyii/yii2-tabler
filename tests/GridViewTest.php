<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\grid\GridView;
use yii\data\ArrayDataProvider;

/**
 * Tests for GridView widget
 */
class GridViewTest extends TestCase
{
    public function testNormalGridView()
    {
        GridView::$counter = 0;
        $dataProvider = new ArrayDataProvider([
            'allModels' => [
                ['id' => 1, 'name' => 'Item 1'],
                ['id' => 2, 'name' => 'Item 2'],
            ],
            'pagination' => false,
        ]);

        $html = GridView::widget([
            'dataProvider' => $dataProvider,
            'title' => 'Grid Title',
            'columns' => [
                'id',
                'name',
            ],
        ]);

        $this->assertStringContainsString('class="card"', $html);
        $this->assertStringContainsString('class="card-header"', $html);
        $this->assertStringContainsString('class="card-title"', $html);
        $this->assertStringContainsString('Grid Title', $html);
        $this->assertStringContainsString('class="table-responsive"', $html);
        $this->assertStringContainsString('class="table card-table table-vcenter text-nowrap table-hover"', $html);
        $this->assertStringContainsString('Item 1', $html);
    }

    public function testGridViewVariations()
    {
        GridView::$counter = 0;
        $dataProvider = new ArrayDataProvider([
            'allModels' => [],
        ]);

        $html = GridView::widget([
            'dataProvider' => $dataProvider,
            'striped' => true,
            'outline' => true,
            'hover' => false,
        ]);

        $this->assertStringContainsString('table-striped', $html);
        $this->assertStringContainsString('table-outline', $html);
        $this->assertStringNotContainsString('table-hover', $html);
    }
}
