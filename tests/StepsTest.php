<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Steps;

class StepsTest extends TestCase
{
    public function testStepsRenderVerticalCompletedAndActiveItems(): void
    {
        $html = Steps::widget([
            'vertical' => true,
            'items' => [
                ['label' => 'Mirror', 'completed' => true],
                ['label' => 'Hybrid', 'active' => true, 'description' => 'Local candidate'],
            ],
        ]);

        $this->assertStringContainsString('steps steps-vertical', $html);
        $this->assertStringContainsString('step-item completed', $html);
        $this->assertStringContainsString('step-item active', $html);
        $this->assertStringContainsString('step-title', $html);
        $this->assertStringContainsString('Local candidate', $html);
    }
}
