<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\AvatarList;

class AvatarListTest extends TestCase
{
    public function testAvatarListRendersGroupedAvatars(): void
    {
        $html = AvatarList::widget([
            'stacked' => true,
            'items' => [
                ['text' => 'BY', 'color' => 'blue'],
                ['text' => 'QA', 'color' => 'green'],
            ],
            'placeholderText' => '+1',
        ]);

        $this->assertStringContainsString('avatar-list', $html);
        $this->assertStringContainsString('avatar-list-stacked', $html);
        $this->assertStringContainsString('BY', $html);
        $this->assertStringContainsString('+1', $html);
    }
}
