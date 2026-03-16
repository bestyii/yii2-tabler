<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Spinner;

/**
 * Tests for Spinner widget
 */
class SpinnerTest extends TestCase
{
    public function testNormalSpinner()
    {
        Spinner::$counter = 0;
        $html = Spinner::widget();

        $this->assertStringContainsString('<div id="w0" class="spinner-border" role="status">', $html);
        $this->assertStringContainsString('<span class="visually-hidden">Loading...</span>', $html);
    }

    public function testGrowSpinner()
    {
        Spinner::$counter = 0;
        $html = Spinner::widget([
            'type' => 'grow',
            'color' => 'success',
        ]);

        $this->assertStringContainsString('spinner-grow', $html);
        $this->assertStringContainsString('text-success', $html);
    }

    public function testDotsSpinner()
    {
        Spinner::$counter = 0;
        $html = Spinner::widget([
            'type' => 'dots',
        ]);

        $this->assertStringContainsString('animated-dots', $html);
    }
}
