<?php

namespace bestyii\tabler;

use yii\widgets\ActiveForm as BaseActiveForm;
use yii\helpers\Html;

class ActiveForm extends BaseActiveForm
{
    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     */
    public $fieldClass = 'bestyii\tabler\ActiveField';

    /**
     * @var array HTML attributes for the form tag. Default is `[]`.
     */
    public $options = [];

    /**
     * @var string the form layout. Either 'horizontal', 'inline', or 'default' (default).
     */
    public $layout = 'default';

    public function init(): void
    {
        parent::init();
        if (!isset($this->fieldConfig['class'])) {
            $this->fieldConfig['class'] = ActiveField::class;
        }

        if ($this->layout === 'horizontal') {
            Html::addCssClass($this->options, ['form-horizontal' => 'form-horizontal']);
        } elseif ($this->layout === 'inline') {
            Html::addCssClass($this->options, ['form-inline' => 'form-inline']);
        }
    }
}
