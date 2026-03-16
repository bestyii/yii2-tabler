<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\TomSelect;

/**
 * Tests for TomSelect widget
 */
class TomSelectTest extends TestCase
{
    public function testNormalTomSelect()
    {
        TomSelect::$counter = 0;
        $html = TomSelect::widget([
            'name' => 'tags',
            'items' => [
                'tag1' => 'Tag 1',
                'tag2' => 'Tag 2',
            ],
        ]);

        $this->assertStringContainsString('class="form-select"', $html);
        $this->assertStringContainsString('<option value="tag1">Tag 1</option>', $html);
    }
}
