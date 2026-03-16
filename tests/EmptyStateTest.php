<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\EmptyState;

/**
 * Tests for EmptyState widget
 */
class EmptyStateTest extends TestCase
{
    public function testEmptyStateWithIcon()
    {
        EmptyState::$counter = 0;
        $html = EmptyState::widget([
            'title' => 'No results found',
            'subtitle' => 'Try adjusting your search filters.',
            'icon' => 'search',
        ]);

        $this->assertStringContainsString('class="empty"', $html);
        $this->assertStringContainsString('empty-icon', $html);
        $this->assertStringContainsString('No results found', $html);
    }

    public function testEmptyStateWithImageAndButton()
    {
        EmptyState::$counter = 0;
        $html = EmptyState::widget([
            'title' => 'Welcome!',
            'image' => '/assets/welcome.png',
            'buttonText' => 'Get Started',
            'buttonLink' => ['site/index'],
        ]);

        $this->assertStringContainsString('empty-img', $html);
        $this->assertStringContainsString('src="/assets/welcome.png"', $html);
        $this->assertStringContainsString('Get Started', $html);
        $this->assertStringContainsString('empty-action', $html);
    }
}
