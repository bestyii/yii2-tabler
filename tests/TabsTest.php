<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Tabs;

class TabsTest extends TestCase
{
    public function testTabsRenderActiveNavAndPane(): void
    {
        $html = Tabs::widget([
            'items' => [
                [
                    'label' => 'Overview',
                    'content' => 'Panel A',
                    'active' => true,
                ],
                [
                    'label' => 'Activity',
                    'content' => 'Panel B',
                ],
            ],
        ]);

        $this->assertStringContainsString('nav nav-tabs', $html);
        $this->assertStringContainsString('nav-link active', $html);
        $this->assertStringContainsString('tab-content', $html);
        $this->assertStringContainsString('tab-pane active show', $html);
        $this->assertStringContainsString('Panel A', $html);
    }
}
