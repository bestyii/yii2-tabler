<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Steps;

/**
 * Tests for Steps widget
 */
class StepsTest extends TestCase
{
    public function testStepsCounter()
    {
        Steps::$counter = 0;
        $html = Steps::widget([
            'type' => 'counter',
            'items' => [
                ['title' => 'Step 1', 'active' => true],
                ['title' => 'Step 2'],
            ],
        ]);

        $this->assertStringContainsString('steps-counter', $html);
        $this->assertStringContainsString('step-item active', $html);
    }

    public function testStepsWithSubtitleAndUrl()
    {
        Steps::$counter = 0;
        $html = Steps::widget([
            'items' => [
                [
                    'title' => 'Done',
                    'subtitle' => 'Description here',
                    'url' => ['site/index'],
                ],
            ],
        ]);

        $this->assertStringContainsString('step-item-link', $html);
        $this->assertStringContainsString('text-muted sm', $html);
        $this->assertStringContainsString('Description here', $html);
    }
}
