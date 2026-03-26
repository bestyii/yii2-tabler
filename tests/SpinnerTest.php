<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Spinner;

class SpinnerTest extends TestCase
{
    public function testSpinnerRendersColorAndSize(): void
    {
        $html = Spinner::widget([
            'color' => 'orange',
            'size' => 'sm',
            'label' => 'Loading queue',
        ]);

        $this->assertStringContainsString('spinner-border spinner-border-sm text-orange', $html);
        $this->assertStringContainsString('role="status"', $html);
        $this->assertStringContainsString('Loading queue', $html);
    }

    public function testSpinnerShortcutSwitchesType(): void
    {
        $html = Spinner::grow(color: 'blue', size: 'sm', label: 'Growing');

        $this->assertStringContainsString('spinner-grow spinner-grow-sm text-blue', $html);
        $this->assertStringContainsString('Growing', $html);
    }

    public function testSpinnerMakeSupportsDynamicTypeAndColor(): void
    {
        $html = Spinner::make(type: 'grow', color: 'green', label: 'Loading jobs');

        $this->assertStringContainsString('spinner-grow', $html);
        $this->assertStringContainsString('text-green', $html);
        $this->assertStringContainsString('Loading jobs', $html);
    }
}
