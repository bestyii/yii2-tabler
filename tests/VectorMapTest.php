<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\VectorMap;

class VectorMapTest extends TestCase
{
    public function testVectorMapRegistersJsVectorMap(): void
    {
        $html = VectorMap::widget([
            'mapOptions' => [
                'map' => 'world_merc',
            ],
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('<div', $html);
        $this->assertStringContainsString('jsVectorMap', $scripts);
        $this->assertStringContainsString('world_merc', $scripts);
    }
}
