<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\ActiveForm;
use yii\base\DynamicModel;

/**
 * Tests for ActiveForm widget
 */
class ActiveFormTest extends TestCase
{
    public function testNormalForm()
    {
        $model = new DynamicModel(['name' => 'John Doe']);
        $model->addRule('name', 'required');

        ActiveForm::$counter = 0;
        ob_start();
        $form = ActiveForm::begin([
            'action' => '/test',
        ]);
        echo $form->field($model, 'name');
        ActiveForm::end();
        $html = ob_get_clean();

        $this->assertStringContainsString('<form id="w0" action="/test" method="post">', $html);
        $this->assertStringContainsString('name="DynamicModel[name]"', $html);
    }
}
