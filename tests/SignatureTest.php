<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\View;
use bestyii\tabler\Signature;

class SignatureTest extends TestCase
{
    public function testSignatureRendersCanvasAndRegistersLibrary(): void
    {
        $html = Signature::widget([
            'name' => 'approvalSignature',
            'height' => 140,
        ]);

        $scripts = implode("\n", Yii::$app->view->js[View::POS_READY] ?? []);

        $this->assertStringContainsString('<canvas', $html);
        $this->assertStringContainsString('approvalSignature', $html);
        $this->assertStringContainsString('new SignaturePad', $scripts);
        $this->assertStringContainsString('tablerSignatureInit', $scripts);
    }
}
