<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Tracking;

/**
 * Tests for Tracking widget
 */
class TrackingTest extends TestCase
{
    public function testTrackingBasic()
    {
        Tracking::$counter = 0;
        $html = Tracking::widget([
            'items' => [
                ['color' => 'success', 'tooltip' => 'Task Finished'],
                ['color' => 'danger', 'tooltip' => 'Error Occurred'],
                ['color' => 'warning'],
            ],
        ]);

        $this->assertStringContainsString('class="tracking"', $html);
        $this->assertStringContainsString('bg-success', $html);
        $this->assertStringContainsString('bg-danger', $html);
        $this->assertStringContainsString('data-bs-toggle="tooltip"', $html);
        $this->assertStringContainsString('title="Task Finished"', $html);
    }
}
