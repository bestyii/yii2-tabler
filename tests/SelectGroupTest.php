<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\SelectGroup;

/**
 * Tests for SelectGroup widget
 */
class SelectGroupTest extends TestCase
{
    public function testNormalSelectGroup()
    {
        SelectGroup::$counter = 0;
        $html = SelectGroup::widget([
            'name' => 'option',
            'value' => '1',
            'items' => [
                '1' => 'Option 1',
                '2' => 'Option 2',
            ],
        ]);

        $this->assertStringContainsString('class="form-selectgroup"', $html);
        $this->assertStringContainsString('type="radio"', $html);
        $this->assertStringContainsString('value="1" checked', $html);
        $this->assertStringContainsString('form-selectgroup-label', $html);
        $this->assertStringContainsString('Option 1', $html);
    }

    public function testComplexSelectGroup()
    {
        SelectGroup::$counter = 0;
        $html = SelectGroup::widget([
            'name' => 'options',
            'multiple' => true,
            'items' => [
                '1' => ['label' => 'Label 1', 'description' => 'Desc 1', 'icon' => 'user'],
            ],
        ]);

        $this->assertStringContainsString('form-selectgroup-pills', $html);
        $this->assertStringContainsString('type="checkbox"', $html);
        $this->assertStringContainsString('form-selectgroup-label-description', $html);
        $this->assertStringContainsString('Desc 1', $html);
        $this->assertStringContainsString('icon', $html);
    }
}
