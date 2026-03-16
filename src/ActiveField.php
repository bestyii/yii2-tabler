<?php

namespace bestyii\tabler;

use yii\helpers\Html;
use yii\widgets\ActiveField as BaseActiveField;
use yii\helpers\ArrayHelper;

class ActiveField extends BaseActiveField
{
    /**
     * @var string the template that is used to arrange the label, the input field, the error message and the hint text.
     */
    public $template = "{label}\n{input}\n{hint}\n{error}";

    /**
     * @var array the default options for the label tag.
     */
    public $labelOptions = ['class' => 'form-label'];

    /**
     * @var array the default options for the input tag.
     */
    public $inputOptions = ['class' => 'form-control'];

    /**
     * @var array the default options for the error tag.
     */
    public $errorOptions = ['class' => 'invalid-feedback'];

    /**
     * @var array the default options for the hint tag.
     */
    public $hintOptions = ['class' => 'form-hint'];

    /**
     * @var string a tabler icon name to add as prepend icon
     */
    public $iconPrepend;

    /**
     * @var string a tabler icon name to add as append icon
     */
    public $iconAppend;

    public function init(): void
    {
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{input}'])) {
                $this->parts['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
            }
            if (!isset($this->parts['{label}'])) {
                $this->parts['{label}'] = Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
            }
            if (!isset($this->parts['{error}'])) {
                $this->parts['{error}'] = Html::error($this->model, $this->attribute, $this->errorOptions);
            }
            if (!isset($this->parts['{hint}'])) {
                $this->parts['{hint}'] = Html::activeHint($this->model, $this->attribute, $this->hintOptions);
            }

            // Handle Input Icons (InputIcon)
            if ($this->iconPrepend || $this->iconAppend) {
                $inputHtml = $this->parts['{input}'];
                $iconHtml = '';
                $wrapperOptions = ['class' => 'input-icon'];

                if ($this->iconPrepend) {
                    $iconHtml .= Html::tag('span', \bestyii\tabler\Icon::widget(['name' => $this->iconPrepend]), ['class' => 'input-icon-addon']);
                    $inputHtml = $iconHtml . $inputHtml;
                }

                if ($this->iconAppend) {
                    $iconHtml = Html::tag('span', \bestyii\tabler\Icon::widget(['name' => $this->iconAppend]), ['class' => 'input-icon-addon']);
                    $inputHtml = $inputHtml . $iconHtml;
                }

                $this->parts['{input}'] = Html::tag('div', $inputHtml, $wrapperOptions);
            }

            $content = strtr($this->template, $this->parts);
        } elseif (!is_string($content)) {
            $content = call_user_func($content, $this);
        }

        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }
}
