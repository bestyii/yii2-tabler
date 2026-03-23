<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Timeline;

class TimelineTest extends TestCase
{
    public function testTimelineRendersEventCards(): void
    {
        $html = Timeline::widget([
            'items' => [
                [
                    'time' => '10 min ago',
                    'title' => 'Preview smoke passed',
                    'description' => 'Docs and preview routes stayed green.',
                    'icon' => 'check',
                ],
            ],
        ]);

        $this->assertStringContainsString('timeline-event', $html);
        $this->assertStringContainsString('Preview smoke passed', $html);
        $this->assertStringContainsString('10 min ago', $html);
    }
}
