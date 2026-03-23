<?php

declare(strict_types=1);

namespace bestyii\tabler;

use bestyii\tabler\assets\ListjsAsset;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;

class AdvancedTable extends Widget
{
    public string $title = '';
    public ?string $description = null;
    public array $columns = [];
    public array $rows = [];
    public array $actions = [];
    public array $pageSizes = [10, 20, 50, 100];
    public int $pageSize = 20;
    public string $searchPlaceholder = 'Search';
    public string $recordsLabel = 'records';
    public string $emptyText = 'No data available.';
    public array $options = [];

    public function run(): string
    {
        $this->options['id'] ??= $this->getId();
        Html::addCssClass($this->options, 'card');

        $this->pageSizes = array_values(array_unique(array_map(static fn($size): int => (int) $size, $this->pageSizes)));
        sort($this->pageSizes);
        if (!in_array($this->pageSize, $this->pageSizes, true)) {
            $this->pageSizes[] = $this->pageSize;
            sort($this->pageSizes);
        }

        $content = Html::tag('div', $this->renderHeader() . $this->renderTableContainer(), [
            'class' => 'card-table',
        ]);

        $this->registerPlugin();

        return Html::tag('div', $content, $this->options);
    }

    private function renderHeader(): string
    {
        $searchId = $this->options['id'] . '-search';
        $search = Html::tag(
            'div',
            Html::tag('span', Icon::widget([
                'name' => 'search',
            ]), [
                'class' => 'input-group-text',
            ]) .
            Html::input('text', null, '', [
                'id' => $searchId,
                'class' => 'form-control',
                'autocomplete' => 'off',
                'placeholder' => $this->searchPlaceholder,
            ]),
            [
                'class' => 'input-group input-group-flat w-auto',
            ],
        );

        $tools = [$search];
        foreach ($this->actions as $action) {
            $tools[] = (string) $action;
        }

        return Html::tag(
            'div',
            Html::tag(
                'div',
                Html::tag(
                    'div',
                    Html::tag('h3', Html::encode($this->title), [
                        'class' => 'card-title mb-0',
                    ])
                    . ($this->description !== null && $this->description !== ''
                        ? Html::tag('p', Html::encode($this->description), [
                            'class' => 'text-secondary m-0',
                        ])
                        : ''),
                    [
                        'class' => 'col',
                    ],
                )
                . Html::tag(
                    'div',
                    Html::tag('div', implode("\n", $tools), [
                        'class' => 'ms-auto d-flex flex-wrap align-items-center gap-2',
                    ]),
                    [
                        'class' => 'col-md-auto col-sm-12',
                    ],
                ),
                [
                    'class' => 'row w-100',
                ],
            ),
            [
                'class' => 'card-header',
            ],
        );
    }

    private function renderTableContainer(): string
    {
        $id = $this->options['id'];
        $pageSizeId = $id . '-page-size';

        $table = Html::tag(
            'div',
            Html::tag(
                'table',
                $this->renderHeaderRow() . $this->renderBody(),
                [
                    'class' => 'table table-vcenter',
                ],
            ),
            [
                'class' => 'table-responsive',
            ],
        );

        $pageSizeOptions = [];
        foreach ($this->pageSizes as $size) {
            $pageSizeOptions[] = Html::tag('option', Html::encode((string) $size), [
                'value' => (string) $size,
                'selected' => $size === $this->pageSize,
            ]);
        }

        $footer = Html::tag(
            'div',
            Html::tag(
                'div',
                Html::tag('span', Html::encode('Show'), [
                    'class' => 'text-secondary small',
                ]) .
                Html::tag('select', implode("\n", $pageSizeOptions), [
                    'id' => $pageSizeId,
                    'class' => 'form-select form-select-sm w-auto',
                ]) .
                Html::tag('span', Html::encode($this->recordsLabel), [
                    'class' => 'text-secondary small',
                ]),
                [
                    'class' => 'd-flex align-items-center gap-2',
                ],
            )
            . Html::tag('ul', '', [
                'class' => 'pagination m-0',
            ]),
            [
                'class' => 'card-footer d-flex align-items-center justify-content-between gap-3',
            ],
        );

        return Html::tag('div', $table . $footer, [
            'id' => $id,
        ]);
    }

    private function renderHeaderRow(): string
    {
        $headers = [];
        foreach ($this->visibleColumns() as $index => $column) {
            $label = (string) ($column['label'] ?? Inflector::camel2words((string) ($column['attribute'] ?? 'Column')));
            $sortName = $this->valueName($column, $index);
            $button = Html::button(
                Html::encode($label),
                [
                    'type' => 'button',
                    'class' => 'sort table-sort d-inline-flex justify-content-between w-100',
                    'data-sort' => $sortName,
                ],
            );
            $headers[] = Html::tag('th', $button, (array) ($column['headerOptions'] ?? []));
        }

        return Html::tag('thead', Html::tag('tr', implode("\n", $headers)));
    }

    private function renderBody(): string
    {
        $columns = $this->visibleColumns();

        if ($this->rows === []) {
            return Html::tag('tbody', Html::tag('tr', Html::tag('td', Html::encode($this->emptyText), [
                'colspan' => max(1, count($columns)),
                'class' => 'text-secondary',
            ])), [
                'class' => 'list',
            ]);
        }

        $rows = [];
        foreach (array_values($this->rows) as $rowIndex => $row) {
            $cells = [];
            foreach ($columns as $columnIndex => $column) {
                $valueName = $this->valueName($column, $columnIndex);
                $cellOptions = (array) ($column['contentOptions'] ?? []);
                Html::addCssClass($cellOptions, $valueName);
                $content = $this->resolveCellContent($column, $row, $rowIndex);
                $cells[] = Html::tag('td', $content, $cellOptions);
            }
            $rows[] = Html::tag('tr', implode("\n", $cells));
        }

        return Html::tag('tbody', implode("\n", $rows), [
            'class' => 'list',
        ]);
    }

    private function registerPlugin(): void
    {
        ListjsAsset::register($this->getView());

        $id = $this->options['id'];
        $searchId = $id . '-search';
        $pageSizeId = $id . '-page-size';
        $valueNames = [];
        foreach ($this->visibleColumns() as $index => $column) {
            $valueNames[] = $this->valueName($column, $index);
        }

        $idJson = Json::htmlEncode($id);
        $searchIdJson = Json::htmlEncode($searchId);
        $pageSizeIdJson = Json::htmlEncode($pageSizeId);
        $valueNamesJson = Json::htmlEncode($valueNames);
        $pageSize = (int) $this->pageSize;

        $js = <<<JS
(() => {
  const root = document.getElementById($idJson);
  if (!root || !window.List || root.dataset.tablerAdvancedTableInit === '1') {
    return;
  }

  const list = new List($idJson, {
    listClass: 'list',
    sortClass: 'sort',
    page: $pageSize,
    pagination: {
      paginationClass: 'pagination',
      innerWindow: 1,
      outerWindow: 1,
      left: 0,
      right: 0,
      item: value => '<li class="page-item"><a class="page-link cursor-pointer">' + value.page + '</a></li>'
    },
    valueNames: $valueNamesJson
  });

  const searchInput = document.getElementById($searchIdJson);
  if (searchInput) {
    searchInput.addEventListener('input', () => {
      list.search(searchInput.value);
    });
  }

  const pageSizeSelect = document.getElementById($pageSizeIdJson);
  if (pageSizeSelect) {
    pageSizeSelect.addEventListener('change', () => {
      const nextPageSize = parseInt(pageSizeSelect.value, 10);
      if (!Number.isNaN(nextPageSize)) {
        list.page = nextPageSize;
        list.update();
      }
    });
  }

  root.dataset.tablerAdvancedTableInit = '1';
})();
JS;

        $this->getView()->registerJs($js);
    }

    private function visibleColumns(): array
    {
        return array_values(array_filter(
            $this->columns,
            static fn(array $column): bool => ($column['visible'] ?? true) !== false,
        ));
    }

    private function valueName(array $column, int $index): string
    {
        if (!empty($column['sort'])) {
            return (string) $column['sort'];
        }

        if (!empty($column['attribute'])) {
            return 'sort-' . Inflector::slug((string) $column['attribute']);
        }

        return 'sort-' . $index;
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
}
