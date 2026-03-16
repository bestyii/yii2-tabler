<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\ColorInput;

/**
 * Tests for ColorInput widget
 */
class ColorInputTest extends TestCase
{
    public function testNormalColorInput()
    {
        ColorInput::$counter = 0;
        $html = ColorInput::widget([
            'name' => 'color',
            'value' => 'blue',
            'items' => [
                'blue' => 'blue',
                'red' => 'red',
            ],
        ]);

        $this->assertStringContainsString('class="form-colorinput"', $html);
        $this->assertStringContainsString('type="radio"', $html);
        $this->assertStringContainsString('value="blue" checked', $html);
        $this->assertStringContainsString('bg-blue', $html);
    }

    public function testMultipleColorInput()
    {
        ColorInput::$counter = 0;
        $html = ColorInput::widget([
            'name' => 'colors',
            'multiple' => true,
            'value' => ['blue', 'red'],
            'items' => [
                'blue' => 'blue',
                'red' => 'red',
            ],
            'rounded' => true,
        ]);

        $this->assertStringContainsString('type="checkbox"', $html);
        $this->assertStringContainsString('value="blue" checked', $html);
        $this->assertStringContainsString('value="red" checked', $html);
        $this->assertStringContainsString('rounded-circle', $html);
    }
}
