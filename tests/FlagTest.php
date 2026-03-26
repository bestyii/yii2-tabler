<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use bestyii\tabler\Flag;
use bestyii\tabler\assets\TablerFlagsAsset;
use yii\web\View;

class FlagTest extends TestCase
{
    public function testFlagRendersCountryClassAndRegistersFlagsAsset(): void
    {
        $html = Flag::widget([
            'country' => 'us',
            'size' => 'sm',
        ]);

        $view = Yii::$app->getView();
        self::assertInstanceOf(View::class, $view);

        $this->assertStringContainsString('flag-country-us', $html);
        $this->assertStringContainsString('flag-sm', $html);
        $this->assertArrayHasKey(TablerFlagsAsset::class, $view->assetBundles);
    }
}
