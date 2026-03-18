<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Hr;

class HrTest extends TestCase
{
    public function testHrRendersDividerText(): void
    {
        $html = Hr::widget([
            'text' => 'Quick toggle',
            'position' => 'center',
            'color' => 'muted',
        ]);

        $this->assertStringContainsString('hr-text', $html);
        $this->assertStringContainsString('Quick toggle', $html);
        $this->assertStringContainsString('text-muted', $html);
    }
}
