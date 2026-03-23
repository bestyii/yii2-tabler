<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\base\InvalidConfigException;
use yii\helpers\Html;

class ActiveForm extends \yii\widgets\ActiveForm
{
    public const LAYOUT_DEFAULT = 'default';
    public const LAYOUT_HORIZONTAL = 'horizontal';
    public const LAYOUT_INLINE = 'inline';
    public const LAYOUT_FLOATING = 'floating';

    public $fieldClass = ActiveField::class;
    public $options = [];
    public string $layout = self::LAYOUT_DEFAULT;
    public $errorCssClass = 'is-invalid';
    public $successCssClass = 'is-valid';
    public $errorSummaryCssClass = 'alert alert-danger';
    public $validationStateOn = self::VALIDATION_STATE_ON_INPUT;

    /**
     * @throws InvalidConfigException
     */
    public function init(): void
    {
        if (!in_array($this->layout, [
            self::LAYOUT_DEFAULT,
            self::LAYOUT_HORIZONTAL,
            self::LAYOUT_INLINE,
            self::LAYOUT_FLOATING,
        ], true)) {
            throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
        }

        if ($this->layout === self::LAYOUT_INLINE) {
            Html::addCssClass($this->options, [
                'row',
                'row-cols-lg-auto',
                'g-3',
                'align-items-end',
            ]);
        }

        parent::init();
    }

    public function field($model, $attribute, $options = []): ActiveField
    {
        $field = parent::field($model, $attribute, $options);

        if (!$field instanceof ActiveField) {
            throw new InvalidConfigException('ActiveField class must resolve to bestyii\\tabler\\ActiveField.');
        }

        return $field;
    }
}
