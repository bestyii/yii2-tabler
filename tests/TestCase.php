<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\di\Container;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->mockWebApplication();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Yii::$app = null;
        Yii::$container = new Container();
    }

    protected function mockWebApplication(array $config = []): void
    {
        FileHelper::createDirectory(dirname(__DIR__, 4) . '/runtime/assets');

        new \yii\web\Application(ArrayHelper::merge([
            'id' => 'tabler-test',
            'basePath' => dirname(__DIR__),
            'vendorPath' => dirname(__DIR__, 4) . '/vendor',
            'aliases' => [
                '@bower' => '@vendor/bower-asset',
                '@npm' => '@vendor/npm-asset',
            ],
            'components' => [
                'request' => [
                    'cookieValidationKey' => 'test-key',
                    'scriptFile' => __FILE__,
                    'scriptUrl' => '/index.php',
                ],
                'assetManager' => [
                    'basePath' => dirname(__DIR__, 4) . '/runtime/assets',
                    'baseUrl' => '/assets',
                ],
            ],
        ], $config));
    }
}
