<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Pagination;

class PaginationTest extends TestCase
{
    public function testPaginationRendersActiveAndDisabledItems(): void
    {
        $html = Pagination::widget([
            'size' => 'sm',
            'items' => [
                [
                    'label' => 'Prev',
                    'disabled' => true,
                ],
                [
                    'label' => '1',
                    'active' => true,
                ],
                [
                    'label' => '2',
                    'url' => '/page/2',
                ],
            ],
        ]);

        $this->assertStringContainsString('pagination pagination-sm', $html);
        $this->assertStringContainsString('page-item disabled', $html);
        $this->assertStringContainsString('page-item active', $html);
        $this->assertStringContainsString('page-link', $html);
        $this->assertStringContainsString('/page/2', $html);
    }
}
