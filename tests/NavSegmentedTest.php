<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\NavSegmented;

class NavSegmentedTest extends TestCase
{
    public function testNavSegmentedRendersActiveAndDisabledItems(): void
    {
        $html = NavSegmented::widget([
            'items' => [
                [
                    'label' => 'Overview',
                    'active' => true,
                ],
                [
                    'label' => 'Compare',
                ],
                [
                    'label' => 'Docs',
                    'disabled' => true,
                ],
            ],
            'fullWidth' => true,
        ]);

        $this->assertStringContainsString('nav-segmented', $html);
        $this->assertStringContainsString('Overview', $html);
        $this->assertStringContainsString('active', $html);
        $this->assertStringContainsString('disabled', $html);
    }
}
