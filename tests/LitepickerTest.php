<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Litepicker;

/**
 * Tests for Litepicker widget
 */
class LitepickerTest extends TestCase
{
    public function testNormalLitepicker()
    {
        Litepicker::$counter = 0;
        $html = Litepicker::widget([
            'name' => 'date',
            'value' => '2023-01-01',
        ]);

        $this->assertStringContainsString('class="input-icon"', $html);
        $this->assertStringContainsString('class="form-control"', $html);
        $this->assertStringContainsString('value="2023-01-01"', $html);
        $this->assertStringContainsString('input-icon-addon', $html);
    }
}
