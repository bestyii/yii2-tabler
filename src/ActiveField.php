<?php

declare(strict_types=1);

namespace bestyii\tabler;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField
{
    public bool $inline = false;
    public ?string $inputTemplate = null;
    public array $wrapperOptions = [];
    public $options = [
        'class' => ['mb-3'],
    ];
    public $inputOptions = [
        'class' => ['form-control'],
    ];
    public $checkOptions = [
        'class' => ['form-check-input'],
        'labelOptions' => [
            'class' => ['form-check-label'],
        ],
    ];
    public $radioOptions = [
        'class' => ['form-check-input'],
        'labelOptions' => [
            'class' => ['form-check-label'],
        ],
    ];
    public $errorOptions = [
        'tag' => 'div',
        'class' => 'invalid-feedback',
    ];
    public $labelOptions = [
        'class' => ['form-label'],
    ];
    public $hintOptions = [
        'tag' => 'div',
        'class' => ['form-hint'],
    ];
    public array $horizontalCssClasses = [];
    public string $checkTemplate = "<div class=\"form-check\">\n{input}\n{label}\n{error}\n{hint}\n</div>";
    public string $switchTemplate = "<div class=\"form-check form-switch\">\n{input}\n{label}\n{error}\n{hint}\n</div>";
    public string $radioTemplate = "<div class=\"form-check\">\n{input}\n{label}\n{error}\n{hint}\n</div>";
    public string $checkHorizontalTemplate = "{beginWrapper}\n<div class=\"form-check\">\n{input}\n{label}\n{error}\n{hint}\n</div>\n{endWrapper}";
    public string $switchHorizontalTemplate = "{beginWrapper}\n<div class=\"form-check form-switch\">\n{input}\n{label}\n{error}\n{hint}\n</div>\n{endWrapper}";
    public string $radioHorizontalTemplate = "{beginWrapper}\n<div class=\"form-check\">\n{input}\n{label}\n{error}\n{hint}\n</div>\n{endWrapper}";
    public string $checkEnclosedTemplate = "<div class=\"form-check\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
    public string $switchEnclosedTemplate = "<div class=\"form-check form-switch\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
    public bool $enableError = true;
    public bool $enableLabel = true;

    public function __construct($config = [])
    {
        parent::__construct(ArrayHelper::merge($this->createLayoutConfig($config), $config));
    }

    public function render($content = null): string
    {
        if ($content === null) {
            if (!isset($this->parts['{beginWrapper}'])) {
                $options = $this->wrapperOptions;
                $tag = ArrayHelper::remove($options, 'tag', 'div');
                $this->parts['{beginWrapper}'] = Html::beginTag($tag, $options);
                $this->parts['{endWrapper}'] = Html::endTag($tag);
            }

            if ($this->enableLabel === false) {
                $this->parts['{label}'] = '';
                $this->parts['{beginLabel}'] = '';
                $this->parts['{labelTitle}'] = '';
                $this->parts['{endLabel}'] = '';
            } elseif (!isset($this->parts['{beginLabel}'])) {
                $this->renderLabelParts();
            }

            if ($this->enableError === false) {
                $this->parts['{error}'] = '';
            }

            if ($this->inputTemplate !== null) {
                $options = $this->inputOptions;
                if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
                    $this->addErrorClassIfNeeded($options);
                }

                $this->addAriaAttributes($options);
                $input = $this->parts['{input}'] ?? Html::activeTextInput($this->model, $this->attribute, $options);
                $this->parts['{input}'] = strtr($this->inputTemplate, [
                    '{input}' => $input,
                ]);
            }
        }

        return parent::render($content);
    }

    public function checkbox($options = [], $enclosedByLabel = false): self
    {
        $options = ArrayHelper::merge($this->checkOptions, $options);
        $labelOptions = ArrayHelper::remove($options, 'labelOptions', []);
        $wrapperOptions = ArrayHelper::remove($options, 'wrapperOptions', []);
        $switch = (bool) ArrayHelper::remove($options, 'switch', false);

        Html::removeCssClass($options, 'form-control');
        $this->labelOptions = ArrayHelper::merge($this->labelOptions, $labelOptions);
        $this->wrapperOptions = ArrayHelper::merge($this->wrapperOptions, $wrapperOptions);

        if ($switch) {
            $this->addRoleAttributes($options, 'switch');
        }

        if (!isset($options['template'])) {
            if ($switch) {
                $this->template = $enclosedByLabel ? $this->switchEnclosedTemplate : $this->switchTemplate;
            } else {
                $this->template = $enclosedByLabel ? $this->checkEnclosedTemplate : $this->checkTemplate;
            }
        } else {
            $this->template = $options['template'];
        }

        if ($this->isHorizontalLayout()) {
            if (!isset($options['template'])) {
                $this->template = $switch ? $this->switchHorizontalTemplate : $this->checkHorizontalTemplate;
            }
            Html::removeCssClass($this->labelOptions, $this->horizontalCssClasses['label']);
            Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
        }

        if ($this->isInlineLayout()) {
            Html::removeCssClass($this->labelOptions, 'visually-hidden');
        }

        Html::removeCssClass($this->labelOptions, 'form-label');
        unset($options['template']);

        if ($enclosedByLabel && isset($options['label'])) {
            $this->parts['{labelTitle}'] = (string) $options['label'];
        }

        parent::checkbox($options, false);

        return $this;
    }

    public function radio($options = [], $enclosedByLabel = false): self
    {
        $options = ArrayHelper::merge($this->radioOptions, $options);
        $labelOptions = ArrayHelper::remove($options, 'labelOptions', []);
        $wrapperOptions = ArrayHelper::remove($options, 'wrapperOptions', []);

        Html::removeCssClass($options, 'form-control');
        $this->labelOptions = ArrayHelper::merge($this->labelOptions, $labelOptions);
        $this->wrapperOptions = ArrayHelper::merge($this->wrapperOptions, $wrapperOptions);

        if (!isset($options['template'])) {
            $this->template = $enclosedByLabel ? $this->checkEnclosedTemplate : $this->radioTemplate;
        } else {
            $this->template = $options['template'];
        }

        if ($this->isHorizontalLayout()) {
            if (!isset($options['template'])) {
                $this->template = $this->radioHorizontalTemplate;
            }
            Html::removeCssClass($this->labelOptions, $this->horizontalCssClasses['label']);
            Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
        }

        Html::removeCssClass($this->labelOptions, 'form-label');
        unset($options['template']);

        if ($enclosedByLabel && isset($options['label'])) {
            $this->parts['{labelTitle}'] = (string) $options['label'];
        }

        parent::radio($options, false);

        return $this;
    }

    public function checkboxList($items, $options = []): self
    {
        if (!isset($options['item'])) {
            $this->template = str_replace("\n{error}", '', $this->template);
            $itemOptions = (array) ($options['itemOptions'] ?? []);
            $encode = ArrayHelper::getValue($options, 'encode', true);
            $itemCount = count($items) - 1;
            $error = $this->error()->parts['{error}'];
            $options['item'] = function (int $index, string $label, string $name, bool $checked, string $value) use ($itemOptions, $encode, $itemCount, $error): string {
                $item = array_merge($this->checkOptions, [
                    'label' => $encode ? Html::encode($label) : $label,
                    'value' => $value,
                ], $itemOptions);
                $wrapperOptions = ArrayHelper::remove($item, 'wrapperOptions', [
                    'class' => ['form-check'],
                ]);
                if ($this->inline) {
                    Html::addCssClass($wrapperOptions, 'form-check-inline');
                }

                $html = Html::beginTag('div', $wrapperOptions) . "\n" . Html::checkbox($name, $checked, $item) . "\n";
                if ($index === $itemCount) {
                    $html .= $error . "\n";
                }

                return $html . Html::endTag('div') . "\n";
            };
        }

        parent::checkboxList($items, $options);

        return $this;
    }

    public function radioList($items, $options = []): self
    {
        if (!isset($options['item'])) {
            $this->template = str_replace("\n{error}", '', $this->template);
            $itemOptions = (array) ($options['itemOptions'] ?? []);
            $encode = ArrayHelper::getValue($options, 'encode', true);
            $itemCount = count($items) - 1;
            $error = $this->error()->parts['{error}'];
            $options['item'] = function (int $index, string $label, string $name, bool $checked, string $value) use ($itemOptions, $encode, $itemCount, $error): string {
                $item = array_merge($this->radioOptions, [
                    'label' => $encode ? Html::encode($label) : $label,
                    'value' => $value,
                ], $itemOptions);
                $wrapperOptions = ArrayHelper::remove($item, 'wrapperOptions', [
                    'class' => ['form-check'],
                ]);
                if ($this->inline) {
                    Html::addCssClass($wrapperOptions, 'form-check-inline');
                }

                $html = Html::beginTag('div', $wrapperOptions) . "\n" . Html::radio($name, $checked, $item) . "\n";
                if ($index === $itemCount) {
                    $html .= $error . "\n";
                }

                return $html . Html::endTag('div') . "\n";
            };
        }

        parent::radioList($items, $options);

        return $this;
    }

    public function listBox($items, $options = []): self
    {
        if ($this->isInlineLayout()) {
            Html::removeCssClass($this->labelOptions, 'visually-hidden');
        }

        Html::removeCssClass($options, 'form-control');
        Html::addCssClass($options, 'form-select');
        parent::listBox($items, $options);

        return $this;
    }

    public function dropDownList($items, $options = []): self
    {
        if ($this->isInlineLayout()) {
            Html::removeCssClass($this->labelOptions, 'visually-hidden');
        }

        Html::removeCssClass($options, 'form-control');
        Html::addCssClass($options, 'form-select');
        parent::dropDownList($items, $options);

        return $this;
    }

    public function staticControl(array $options = []): self
    {
        Html::addCssClass($options, 'form-control-plaintext');
        $options['readonly'] = true;
        $value = ArrayHelper::remove($options, 'value', Html::getAttributeValue($this->model, $this->attribute));
        $this->parts['{input}'] = Html::input('text', null, (string) $value, $options);

        return $this;
    }

    public function label($label = null, $options = []): self
    {
        if ($label === false) {
            $this->enableLabel = false;
            if ($this->isHorizontalLayout()) {
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
        } else {
            $this->enableLabel = true;
            $this->renderLabelParts($label, $options);
            parent::label($label, $options);
        }

        return $this;
    }

    public function inline(bool $value = true): self
    {
        $this->inline = $value;

        return $this;
    }

    public function fileInput($options = []): self
    {
        Html::addCssClass($options, 'form-control');
        parent::fileInput($options);

        return $this;
    }

    public function rangeInput(array $options = []): self
    {
        Html::removeCssClass($options, 'form-control');
        Html::addCssClass($options, 'form-range');
        $this->input('range', $options);

        return $this;
    }

    public function colorInput(array $options = []): self
    {
        Html::removeCssClass($options, 'form-control');
        Html::addCssClass($options, ['form-control', 'form-control-color']);

        return $this->input('color', $options);
    }

    protected function createLayoutConfig(array $instanceConfig): array
    {
        $config = [
            'template' => "{label}\n{input}\n{error}\n{hint}",
            'options' => [
                'class' => ['mb-3'],
            ],
            'inputOptions' => [
                'class' => ['form-control'],
            ],
            'labelOptions' => [
                'class' => ['form-label'],
            ],
            'errorOptions' => [
                'tag' => 'div',
                'class' => 'invalid-feedback',
            ],
            'hintOptions' => [
                'tag' => 'div',
                'class' => ['form-hint'],
            ],
        ];

        $form = $instanceConfig['form'] ?? null;
        if (!$form instanceof ActiveForm) {
            return $config;
        }

        if ($form->layout === ActiveForm::LAYOUT_HORIZONTAL) {
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n{error}\n{hint}\n{endWrapper}";
            $config['wrapperOptions'] = [];
            $config['labelOptions'] = [];
            $config['options'] = [];
            $cssClasses = [
                'offset' => ['offset-sm-3', 'col-sm-9'],
                'label' => ['col-sm-3', 'col-form-label'],
                'wrapper' => ['col-sm-9'],
                'error' => [],
                'hint' => [],
                'field' => ['mb-3', 'row'],
            ];

            if (isset($instanceConfig['horizontalCssClasses'])) {
                $cssClasses = ArrayHelper::merge($cssClasses, (array) $instanceConfig['horizontalCssClasses']);
            }

            $config['horizontalCssClasses'] = $cssClasses;
            Html::addCssClass($config['wrapperOptions'], $cssClasses['wrapper']);
            Html::addCssClass($config['labelOptions'], $cssClasses['label']);
            Html::addCssClass($config['errorOptions'], $cssClasses['error']);
            Html::addCssClass($config['hintOptions'], $cssClasses['hint']);
            Html::addCssClass($config['options'], $cssClasses['field']);
        } elseif ($form->layout === ActiveForm::LAYOUT_INLINE) {
            $config['inputOptions']['placeholder'] = $this->resolvePlaceholder($instanceConfig);
            $config['enableError'] = false;
            $config['options'] = [
                'class' => ['col-12', 'col-lg-auto'],
            ];
            Html::addCssClass($config['labelOptions'], 'visually-hidden');
        } elseif ($form->layout === ActiveForm::LAYOUT_FLOATING) {
            $config['template'] = "{input}\n{label}\n{error}\n{hint}";
            $config['inputOptions']['placeholder'] = $this->resolvePlaceholder($instanceConfig);
            Html::addCssClass($config['options'], ['form-floating', 'mb-3']);
        }

        return $config;
    }

    protected function renderLabelParts(?string $label = null, array $options = []): void
    {
        $options = array_merge($this->labelOptions, $options);
        if ($label === null) {
            if (isset($options['label'])) {
                $label = (string) $options['label'];
                unset($options['label']);
            } else {
                $attribute = Html::getAttributeName($this->attribute);
                $label = Html::encode($this->model->getAttributeLabel($attribute));
            }
        }

        if (!isset($options['for'])) {
            $options['for'] = Html::getInputId($this->model, $this->attribute);
        }

        $this->parts['{beginLabel}'] = Html::beginTag('label', $options);
        $this->parts['{endLabel}'] = Html::endTag('label');
        $this->parts['{labelTitle}'] ??= $label;
    }

    private function isHorizontalLayout(): bool
    {
        return $this->form instanceof ActiveForm && $this->form->layout === ActiveForm::LAYOUT_HORIZONTAL;
    }

    private function isInlineLayout(): bool
    {
        return $this->form instanceof ActiveForm && $this->form->layout === ActiveForm::LAYOUT_INLINE;
    }

    private function resolvePlaceholder(array $instanceConfig): string
    {
        $model = $instanceConfig['model'] ?? null;
        $attribute = $instanceConfig['attribute'] ?? null;
        if (!is_object($model) || !is_string($attribute) || $attribute === '') {
            return ' ';
        }

        return $model->getAttributeLabel(Html::getAttributeName($attribute));
    }
}
