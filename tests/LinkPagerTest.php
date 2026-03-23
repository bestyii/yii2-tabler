<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\LinkPager;
use yii\data\Pagination;

class LinkPagerTest extends TestCase
{
    public function testLinkPagerRendersBootstrapCompatiblePaginationMarkup(): void
    {
        $html = LinkPager::widget([
            'pagination' => new Pagination([
                'totalCount' => 120,
                'pageSize' => 10,
                'page' => 2,
                'route' => 'site/index',
            ]),
        ]);

        $this->assertStringContainsString('<nav', $html);
        $this->assertStringContainsString('pagination', $html);
        $this->assertStringContainsString('page-item active', $html);
        $this->assertStringContainsString('page-link', $html);
        $this->assertStringContainsString('data-page="1"', $html);
    }
}
