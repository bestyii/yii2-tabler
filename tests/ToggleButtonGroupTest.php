<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\ToggleButtonGroup;

class ToggleButtonGroupTest extends TestCase
{
    public function testToggleButtonGroupRendersBtnCheckMarkup(): void
    {
        $html = ToggleButtonGroup::widget([
            'name' => 'visibility',
            'value' => 'team',
            'type' => ToggleButtonGroup::TYPE_RADIO,
            'items' => [
                'private' => 'Private',
                'team' => 'Team',
            ],
        ]);

        $this->assertStringContainsString('btn-group', $html);
        $this->assertStringContainsString('btn-check', $html);
        $this->assertStringContainsString('btn-outline-secondary', $html);
        $this->assertStringContainsString('checked', $html);
    }
}
