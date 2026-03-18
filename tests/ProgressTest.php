<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Progress;

class ProgressTest extends TestCase
{
    public function testProgressRendersLabelAndWidth(): void
    {
        $html = Progress::widget([
            'percent' => 72,
            'label' => '72%',
            'color' => 'success',
            'striped' => true,
        ]);

        $this->assertStringContainsString('class="progress"', $html);
        $this->assertStringContainsString('progress-bar', $html);
        $this->assertStringContainsString('progress-bar-striped', $html);
        $this->assertStringContainsString('bg-success', $html);
        $this->assertStringContainsString('width: 72%', $html);
        $this->assertStringContainsString('72%', $html);
    }
}
