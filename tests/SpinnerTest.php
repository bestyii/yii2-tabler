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
}
