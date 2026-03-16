<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\DividedList;

/**
 * Tests for DividedList widget
 */
class DividedListTest extends TestCase
{
    public function testDividedListBasic()
    {
        DividedList::$counter = 0;
        $html = DividedList::widget([
            'items' => [
                'Item 1',
                'Item 2',
            ],
        ]);

        $this->assertStringContainsString('class="divide-y"', $html);
        $this->assertStringContainsString('Item 1', $html);
        $this->assertStringContainsString('Item 2', $html);
    }

    public function testDividedListWithOptions()
    {
        DividedList::$counter = 0;
        $html = DividedList::widget([
            'items' => [
                [
                    'content' => 'Strong Item',
                    'options' => ['class' => 'fw-bold'],
                ],
            ],
        ]);

        $this->assertStringContainsString('class="fw-bold"', $html);
    }
}
