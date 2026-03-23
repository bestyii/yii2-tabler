<?php

declare(strict_types=1);

namespace bestyii\tabler;

use Closure;
use yii\helpers\Html;
use yii\helpers\Inflector;

class Table extends Widget
{
    public array $columns = [];
    public array $rows = [];
    public bool $responsive = true;
    public ?string $responsiveClass = 'table-responsive';
    public bool $vcenter = true;
    public bool $striped = false;
    public bool $hover = false;
    public bool $cardTable = false;
    public bool $nowrap = false;
    public ?string $caption = null;
    public bool $encodeCaption = true;
    public string $emptyText = 'No data available.';
    public array $options = [];
    public array $containerOptions = [];
    public array $theadOptions = [];
    public array $tbodyOptions = [];
    public array $emptyCellOptions = [];
    public array|Closure|null $rowOptions = null;

    public function run(): string
    {
        Html::addCssClass($this->options, 'table');
        if ($this->vcenter) {
            Html::addCssClass($this->options, 'table-vcenter');
        }
        if ($this->striped) {
            Html::addCssClass($this->options, 'table-striped');
        }
        if ($this->hover) {
            Html::addCssClass($this->options, 'table-hover');
        }
        if ($this->cardTable) {
            Html::addCssClass($this->options, 'card-table');
        }
        if ($this->nowrap) {
            Html::addCssClass($this->options, 'table-nowrap');
        }

        $parts = [];
        if ($this->caption !== null && $this->caption !== '') {
            $parts[] = Html::tag(
                'caption',
                $this->encodeCaption ? Html::encode($this->caption) : $this->caption,
                [],
            );
        }

        $header = $this->renderHeader();
        if ($header !== '') {
            $parts[] = $header;
        }

        $parts[] = $this->renderBody();

        $table = Html::tag('table', implode("\n", $parts), $this->options);
        if (!$this->responsive) {
            return $table;
        }

        Html::addCssClass($this->containerOptions, $this->responsiveClass ?: 'table-responsive');

        return Html::tag('div', $table, $this->containerOptions);
    }

    private function renderHeader(): string
    {
        $columns = $this->visibleColumns();
        if ($columns === []) {
            return '';
        }

        $cells = [];
        foreach ($columns as $column) {
            $label = (string) ($column['label'] ?? Inflector::camel2words((string) ($column['attribute'] ?? 'Column')));
            $cells[] = Html::tag('th', Html::encode($label), (array) ($column['headerOptions'] ?? []));
        }

        return Html::tag('thead', Html::tag('tr', implode("\n", $cells)), $this->theadOptions);
    }

    private function renderBody(): string
    {
        $columns = $this->visibleColumns();
        $rows = [];

        if ($this->rows === []) {
            $emptyCellOptions = array_merge([
                'colspan' => max(1, count($columns)),
            ], $this->emptyCellOptions);
            Html::addCssClass($emptyCellOptions, 'text-secondary');
            $rows[] = Html::tag('tr', Html::tag('td', Html::encode($this->emptyText), $emptyCellOptions));

            return Html::tag('tbody', implode("\n", $rows), $this->tbodyOptions);
        }

        foreach (array_values($this->rows) as $index => $row) {
            $cells = [];
            foreach ($columns as $column) {
                $content = $this->resolveCellContent($column, $row, $index);
                $cellOptions = $this->resolveCellOptions($column, $row, $index);

                if (!empty($column['rowHeader'])) {
                    $cellOptions = array_merge([
                        'scope' => 'row',
                    ], $cellOptions);
                    $cells[] = Html::tag('th', $content, $cellOptions);
                } else {
                    $cells[] = Html::tag('td', $content, $cellOptions);
                }
            }

            $rows[] = Html::tag('tr', implode("\n", $cells), $this->resolveRowOptions($row, $index));
        }

        return Html::tag('tbody', implode("\n", $rows), $this->tbodyOptions);
    }

    private function visibleColumns(): array
    {
        return array_values(array_filter(
            $this->columns,
            static fn(array $column): bool => ($column['visible'] ?? true) !== false,
        ));
    }

    private function resolveCellContent(array $column, mixed $row, int $index): string
    {
        if (isset($column['content']) && is_callable($column['content'])) {
            $value = call_user_func($column['content'], $row, $index, $column);
        } elseif (array_key_exists('value', $column)) {
            $value = $column['value'];
        } elseif (isset($column['attribute'])) {
            $attribute = (string) $column['attribute'];
            $value = is_array($row) ? ($row[$attribute] ?? null) : ($row->{$attribute} ?? null);
        } else {
            $value = '';
        }

        $value = $value === null ? '' : (string) $value;

        return !empty($column['encode']) ? Html::encode($value) : $value;
    }

    private function resolveCellOptions(array $column, mixed $row, int $index): array
    {
        $options = $column['contentOptions'] ?? [];
        if (is_callable($options)) {
            $options = call_user_func($options, $row, $index, $column);
        }

        return (array) $options;
    }

    private function resolveRowOptions(mixed $row, int $index): array
    {
        $options = $this->rowOptions ?? [];
        if (is_callable($options)) {
            $options = call_user_func($options, $row, $index);
        }

        return (array) $options;
    }
}
