<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\ButtonGroup;

class ButtonGroupTest extends TestCase
{
    public function testButtonGroupRendersRadioButtonsAndDropdownSplit(): void
    {
        $html = ButtonGroup::widget([
            'radio' => true,
            'items' => [
                ['label' => 'Overview', 'active' => true],
                ['label' => 'Queue'],
                ['label' => 'More', 'items' => [['label' => 'Settings']]],
            ],
        ]);

        $this->assertStringContainsString('btn-group', $html);
        $this->assertStringContainsString('btn-check', $html);
        $this->assertStringContainsString('dropdown-menu-end', $html);
        $this->assertStringContainsString('Overview', $html);
        $this->assertStringContainsString('Settings', $html);
    }
}
