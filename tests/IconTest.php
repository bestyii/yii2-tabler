<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Icon;

/**
 * Tests for Icon widget
 */
class IconTest extends TestCase
{
    public function testNormalIcon()
    {
        Icon::$counter = 0;
        $html = Icon::widget([
            'name' => 'home',
        ]);

        $expectedHtml = '<i id="w0" class="ti ti-home icon"></i>';
        $this->assertEquals($expectedHtml, $html);
    }

    public function testIconWithOptions()
    {
        Icon::$counter = 0;
        $html = Icon::widget([
            'name' => 'user',
            'options' => [
                'class' => 'text-primary',
                'title' => 'User Icon',
            ],
        ]);

        $expectedHtml = '<i id="w0" class="text-primary ti ti-user icon" title="User Icon"></i>';
        $this->assertEquals($expectedHtml, $html);
    }
}
