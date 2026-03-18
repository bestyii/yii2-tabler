<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Payment;

class PaymentTest extends TestCase
{
    public function testPaymentRendersProviderClasses(): void
    {
        $html = Payment::widget([
            'provider' => 'mastercard',
            'size' => 'sm',
            'dark' => true,
        ]);

        $this->assertStringContainsString('payment', $html);
        $this->assertStringContainsString('payment-sm', $html);
        $this->assertStringContainsString('payment-provider-mastercard-dark', $html);
    }
}
