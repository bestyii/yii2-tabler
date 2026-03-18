<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\EmptyState;

class EmptyStateTest extends TestCase
{
    public function testEmptyStateRendersIconTitleSubtitleAndAction(): void
    {
        $html = EmptyState::widget([
            'bordered' => true,
            'title' => 'No archived mirrors',
            'subtitle' => 'Archive pages will appear here later.',
            'buttonLabel' => 'Open board',
        ]);

        $this->assertStringContainsString('empty empty-bordered', $html);
        $this->assertStringContainsString('empty-icon', $html);
        $this->assertStringContainsString('empty-title', $html);
        $this->assertStringContainsString('empty-action', $html);
        $this->assertStringContainsString('Open board', $html);
    }
}
