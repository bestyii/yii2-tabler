<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Dropzone;

class DropzoneTest extends TestCase
{
    public function testDropzoneRendersMessageAndRegistersLibrary(): void
    {
        $html = Dropzone::widget([
            'url' => '/upload',
            'messageTitle' => 'Drop files here',
            'messageDescription' => 'Upload preview notes',
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('class="dropzone"', $html);
        $this->assertStringContainsString('Drop files here', $html);
        $this->assertStringContainsString('new Dropzone', $scripts);
    }
}
