<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Flag;

class FlagTest extends TestCase
{
    public function testFlagRendersCountryClass(): void
    {
        $html = Flag::widget([
            'country' => 'us',
            'size' => 'sm',
        ]);

        $this->assertStringContainsString('flag-country-us', $html);
        $this->assertStringContainsString('flag-sm', $html);
    }
}
