<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Select;

class SelectTest extends TestCase
{
    public function testSelectRendersAndRegistersTomSelect(): void
    {
        $html = Select::widget([
            'name' => 'plan',
            'value' => 'team',
            'items' => ['starter' => 'Starter', 'team' => 'Team'],
            'prompt' => 'Choose a scope',
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('form-select', $html);
        $this->assertStringContainsString('Choose a scope', $html);
        $this->assertStringContainsString('TomSelect', $scripts);
    }
}
