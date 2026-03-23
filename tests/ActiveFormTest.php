<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\ActiveForm;
use yii\base\Model;

class ActiveFormTest extends TestCase
{
    public function testDefaultLayoutRendersTablerFieldClassesAndValidationState(): void
    {
        $model = $this->createModel();
        $model->addError('name', 'Name is required.');

        ob_start();
        $form = ActiveForm::begin([
            'action' => ['/demo/save'],
        ]);
        echo $form->field($model, 'name')->hint('Shown in the navbar');
        ActiveForm::end();
        $html = (string) ob_get_clean();

        $this->assertStringContainsString('form-control is-invalid', $html);
        $this->assertStringContainsString('form-label', $html);
        $this->assertStringContainsString('invalid-feedback', $html);
        $this->assertStringContainsString('form-hint', $html);
        $this->assertStringContainsString('field-demomodel-name', $html);
    }

    public function testHorizontalAndChoiceLayoutsRenderExpectedMarkup(): void
    {
        $model = $this->createModel();

        ob_start();
        $form = ActiveForm::begin([
            'layout' => ActiveForm::LAYOUT_HORIZONTAL,
            'action' => ['/demo/save'],
        ]);
        echo $form->field($model, 'newsletter')->checkbox([
            'label' => 'Receive updates',
        ]);
        echo $form->field($model, 'channels')->inline()->checkboxList([
            'email' => 'Email',
            'sms' => 'SMS',
        ]);
        echo $form->field($model, 'role')->dropDownList([
            'admin' => 'Admin',
            'editor' => 'Editor',
        ]);
        ActiveForm::end();
        $html = (string) ob_get_clean();

        $this->assertStringContainsString('col-sm-3', $html);
        $this->assertStringContainsString('col-sm-9', $html);
        $this->assertStringContainsString('form-check-input', $html);
        $this->assertStringContainsString('form-check-inline', $html);
        $this->assertStringContainsString('form-select', $html);
    }

    private function createModel(): Model
    {
        return new class extends Model {
            public string $name = 'Alice';
            public bool $newsletter = true;
            public string $role = 'admin';
            public array $channels = ['email'];

            public function formName(): string
            {
                return 'DemoModel';
            }

            public function rules(): array
            {
                return [
                    [['name', 'role'], 'string'],
                    [['name'], 'required'],
                    [['newsletter'], 'boolean'],
                    [['channels'], 'safe'],
                ];
            }

            public function attributeLabels(): array
            {
                return [
                    'name' => 'Display Name',
                    'newsletter' => 'Newsletter',
                    'role' => 'Role',
                    'channels' => 'Channels',
                ];
            }
        };
    }
}
