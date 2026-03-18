<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Wysiwyg;

class WysiwygTest extends TestCase
{
    public function testWysiwygRendersTextareaAndRegistersEditor(): void
    {
        $html = Wysiwyg::widget([
            'name' => 'releaseSummary',
            'value' => '<p>Local-first</p>',
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('<textarea', $html);
        $this->assertStringContainsString('releaseSummary', $html);
        $this->assertStringContainsString('hugerte.init', $scripts);
        $this->assertStringContainsString('tablerWysiwygInit', $scripts);
    }
}
