<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Tracking;

class TrackingTest extends TestCase
{
    public function testTrackingRendersBlocksWithStatuses(): void
    {
        $html = Tracking::widget([
            'blocks' => [
                ['status' => 'success', 'title' => 'Operational'],
                ['status' => 'warning', 'title' => 'High load'],
                ['status' => 'danger', 'title' => 'Downtime'],
            ],
        ]);

        $this->assertStringContainsString('tracking', $html);
        $this->assertStringContainsString('bg-success', $html);
        $this->assertStringContainsString('Downtime', $html);
    }
}
