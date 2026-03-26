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

    public function testProgressShortcutAppliesVariantAndOptions(): void
    {
        $html = Progress::success(
            82,
            label: '82%',
            striped: true,
            options: [
                'class' => 'mb-3',
            ],
            barOptions: [
                'class' => 'fw-bold',
            ],
        );

        $this->assertStringContainsString('class="mb-3 progress"', $html);
        $this->assertStringContainsString('progress-bar-striped', $html);
        $this->assertStringContainsString('bg-success', $html);
        $this->assertStringContainsString('fw-bold', $html);
        $this->assertStringContainsString('width: 82%', $html);
    }

    public function testProgressMakeSupportsDynamicColorSelection(): void
    {
        $html = Progress::make(
            color: 'orange',
            percent: 58,
            label: '58%',
            animated: true,
        );

        $this->assertStringContainsString('bg-orange', $html);
        $this->assertStringContainsString('progress-bar-animated', $html);
        $this->assertStringContainsString('width: 58%', $html);
    }
}
