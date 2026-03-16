<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Timeline;

/**
 * Tests for Timeline widget
 */
class TimelineTest extends TestCase
{
    public function testSimpleTimeline()
    {
        Timeline::$counter = 0;
        $html = Timeline::widget([
            'items' => [
                [
                    'time' => '10:00',
                    'title' => 'Event 1',
                    'content' => 'Description 1',
                    'color' => 'success',
                ],
            ],
        ]);

        $this->assertStringContainsString('list-timeline', $html);
        $this->assertStringContainsString('list-timeline-time', $html);
        $this->assertStringContainsString('10:00', $html);
        $this->assertStringContainsString('bg-success', $html);
    }

    public function testEventTimeline()
    {
        Timeline::$counter = 0;
        $html = Timeline::widget([
            'simple' => false,
            'items' => [
                [
                    'title' => 'Complex Event',
                    'icon' => 'check',
                    'card' => true,
                ],
            ],
        ]);

        $this->assertStringContainsString('class="timeline"', $html);
        $this->assertStringContainsString('timeline-event', $html);
        $this->assertStringContainsString('timeline-event-card', $html);
    }
}
