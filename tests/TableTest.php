<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Table;

class TableTest extends TestCase
{
    public function testTableRendersResponsiveStripedMarkup(): void
    {
        $html = Table::widget([
            'striped' => true,
            'cardTable' => true,
            'rows' => [
                [
                    'owner' => 'Alice',
                    'status' => 'Ready',
                ],
            ],
            'columns' => [
                [
                    'attribute' => 'owner',
                    'label' => 'Owner',
                    'rowHeader' => true,
                    'encode' => true,
                ],
                [
                    'attribute' => 'status',
                    'label' => 'Status',
                    'encode' => true,
                ],
            ],
        ]);

        $this->assertStringContainsString('table-responsive', $html);
        $this->assertStringContainsString('table table-vcenter table-striped card-table', $html);
        $this->assertXPathExists('//th[@scope="row" and text()="Alice"]', $html);
        $this->assertXPathExists('//td[text()="Ready"]', $html);
    }

    public function testTableDefaultsToSafeTextFormat(): void
    {
        $html = Table::widget([
            'rows' => [
                [
                    'owner' => '<script>alert(1)</script>',
                ],
            ],
            'columns' => [
                [
                    'attribute' => 'owner',
                    'label' => 'Owner',
                ],
            ],
        ]);

        $this->assertStringContainsString('&lt;script&gt;alert(1)&lt;/script&gt;', $html);
        $this->assertXPathCount(0, '//script', $html);
    }

    public function testTableSupportsExplicitHtmlFormat(): void
    {
        $html = Table::widget([
            'rows' => [
                [
                    'status' => 'Ready',
                ],
            ],
            'columns' => [
                [
                    'label' => 'Status',
                    'content' => static fn(array $row): string => '<strong>' . $row['status'] . '</strong>',
                    'format' => Table::FORMAT_HTML,
                ],
            ],
        ]);

        $this->assertXPathExists('//td/strong[text()="Ready"]', $html);
    }
}
