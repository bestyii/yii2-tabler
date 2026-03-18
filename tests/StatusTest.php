<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Status;

class StatusTest extends TestCase
{
    public function testStatusRendersDotColorAndText(): void
    {
        $html = Status::widget([
            'text' => 'Ready',
            'color' => 'green',
        ]);

        $this->assertStringContainsString('status status-green', $html);
        $this->assertStringContainsString('status-dot bg-green', $html);
        $this->assertStringContainsString('status-text', $html);
        $this->assertStringContainsString('Ready', $html);
    }
}
