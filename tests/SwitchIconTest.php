<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\SwitchIcon;

class SwitchIconTest extends TestCase
{
    public function testSwitchIconRendersTwoStates(): void
    {
        $html = SwitchIcon::widget([
            'icon' => 'heart',
            'active' => true,
        ]);

        $this->assertStringContainsString('switch-icon', $html);
        $this->assertStringContainsString('switch-icon-a', $html);
        $this->assertStringContainsString('switch-icon-b', $html);
        $this->assertStringContainsString('active', $html);
    }
}
