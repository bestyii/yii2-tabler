<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Alert;

/**
 * Tests for Alert widget
 */
class AlertTest extends TestCase
{
    public function testNormalAlert()
    {
        Alert::$counter = 0;
        $html = Alert::widget([
            'body' => '<strong>Holy guacamole!</strong> You should check in on some of those fields below.',
            'options' => [
                'class' => ['alert-warning'],
            ],
        ]);

        $this->assertStringContainsString('alert-warning', $html);
        $this->assertStringContainsString('alert-dismissible', $html);
        $this->assertStringContainsString('Holy guacamole!', $html);
        $this->assertStringContainsString('btn-close', $html);
    }

    public function testDismissibleAlert()
    {
        Alert::$counter = 0;
        $html = Alert::widget([
            'body' => "Message1",
        ]);

        $this->assertStringContainsString('alert-info', $html);
        $this->assertStringContainsString('Message1', $html);
    }

    public function testAlertWithTitle()
    {
        Alert::$counter = 0;
        $html = Alert::widget([
            'title' => 'Title Here',
            'body' => 'Body Here',
        ]);

        $this->assertStringContainsString('alert-title', $html);
        $this->assertStringContainsString('Title Here', $html);
        $this->assertStringContainsString('Body Here', $html);
    }
}
