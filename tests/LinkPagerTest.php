<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\LinkPager;
use yii\data\Pagination;

/**
 * Tests for LinkPager widget
 */
class LinkPagerTest extends TestCase
{
    public function testNormalLinkPager()
    {
        LinkPager::$counter = 0;
        $pagination = new Pagination(['totalCount' => 100, 'pageSize' => 10]);
        $html = LinkPager::widget([
            'pagination' => $pagination,
        ]);

        $this->assertStringContainsString('class="pagination m-0 ms-auto"', $html);
        $this->assertStringContainsString('class="page-item"', $html);
        $this->assertStringContainsString('class="page-link"', $html);
        // Check for Icon:chevron-right in next label
        $this->assertStringContainsString('class="ti', $html);
        $this->assertStringContainsString('Next', $html);
        $this->assertStringContainsString('Prev', $html);
    }
}
