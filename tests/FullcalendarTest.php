<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Fullcalendar;

class FullcalendarTest extends TestCase
{
    public function testFullcalendarRegistersCalendarScript(): void
    {
        $html = Fullcalendar::widget([
            'calendarOptions' => [
                'initialView' => 'dayGridMonth',
                'events' => [
                    [
                        'title' => 'Release cut',
                        'start' => '2026-03-18',
                    ],
                ],
            ],
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('<div', $html);
        $this->assertStringContainsString('FullCalendar.Calendar', $scripts);
        $this->assertStringContainsString('Release cut', $scripts);
    }
}
