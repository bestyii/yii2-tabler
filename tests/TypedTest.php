<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Typed;

class TypedTest extends TestCase
{
    public function testTypedRendersFallbackAndRegistersTypedJs(): void
    {
        $html = Typed::widget([
            'strings' => ['syncing locally', 'reviewing changes'],
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('syncing locally', $html);
        $this->assertStringContainsString('new Typed', $scripts);
        $this->assertStringContainsString('reviewing changes', $scripts);
    }
}
