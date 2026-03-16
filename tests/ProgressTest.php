<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Progress;

/**
 * Tests for Progress widget
 */
class ProgressTest extends TestCase
{
    public function testNormalProgress()
    {
        Progress::$counter = 0;
        $html = Progress::widget([
            'percent' => 50,
        ]);

        $this->assertStringContainsString('<div id="w0" class="progress">', $html);
        $this->assertStringContainsString('class="progress-bar', $html);
        $this->assertStringContainsString('style="width: 50%"', $html);
    }

    public function testProgressWithLabel()
    {
        Progress::$counter = 0;
        $html = Progress::widget([
            'percent' => 75,
            'label' => '75% Complete',
        ]);

        $this->assertStringContainsString('75% Complete', $html);
    }

    public function testProgressVariations()
    {
        Progress::$counter = 0;
        $html = Progress::widget([
            'percent' => 30,
            'color' => 'warning',
            'size' => 'sm',
        ]);

        $this->assertStringContainsString('bg-warning', $html);
        $this->assertStringContainsString('progress-sm', $html);
    }
}
