<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use bestyii\tabler\Payment;
use bestyii\tabler\assets\TablerPaymentsAsset;
use yii\web\View;

class PaymentTest extends TestCase
{
    public function testPaymentRendersProviderClassesAndRegistersPaymentsAsset(): void
    {
        $html = Payment::widget([
            'provider' => 'mastercard',
            'size' => 'sm',
            'dark' => true,
        ]);

        $view = Yii::$app->getView();
        self::assertInstanceOf(View::class, $view);

        $this->assertStringContainsString('payment', $html);
        $this->assertStringContainsString('payment-sm', $html);
        $this->assertStringContainsString('payment-provider-mastercard-dark', $html);
        $this->assertArrayHasKey(TablerPaymentsAsset::class, $view->assetBundles);
    }
}
