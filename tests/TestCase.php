<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\base\Action;
use yii\base\Module;
use yii\di\Container;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * This is the base class for all yii2-tabler unit tests.
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Asserting two strings equality ignoring line endings
     */
    public function assertEqualsWithoutLE(string $expected, string $actual)
    {
        $expected = str_replace("\r\n", "\n", $expected);
        $actual = str_replace("\r\n", "\n", $actual);

        $this->assertEquals($expected, $actual);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockWebApplication();
        $this->mockAction('site', 'index');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->destroyApplication();
    }

    protected function mockWebApplication(array $config = [], string $appClass = '\yii\web\Application')
    {
        new $appClass(ArrayHelper::merge([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => dirname(__DIR__, 5) . '/vendor',
            'aliases' => [
                '@bower' => '@vendor/bower-asset',
                '@npm' => '@vendor/npm-asset',
                '@bestyii/tabler' => dirname(__DIR__) . '/src',
            ],
            'components' => [
                'request' => [
                    'cookieValidationKey' => 'wefJDF8sfdsfSDefwqdxj9oq',
                    'scriptFile' => __DIR__ . '/index.php',
                    'scriptUrl' => '/index.php',
                    'url' => '/index.php',
                    'hostInfo' => 'http://localhost',
                ],
                'assetManager' => [
                    'basePath' => '@bestyii/tabler/tests/assets',
                    'baseUrl' => '/',
                ],
            ],
        ], $config));
    }

    /**
     * Mocks controller action with parameters
     */
    protected function mockAction(string $controllerId, string $actionID, ?string $moduleID = null, array $params = [])
    {
        Yii::$app->controller = $controller = new Controller($controllerId, Yii::$app);
        $controller->actionParams = $params;
        $controller->action = new Action($actionID, $controller);
        Yii::$app->requestedRoute = $controller->getUniqueId() . '/' . $actionID;

        if ($moduleID !== null) {
            $controller->module = new Module($moduleID);
        }
    }

    /**
     * Removes controller
     */
    protected function removeMockedAction()
    {
        Yii::$app->controller = null;
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication()
    {
        Yii::$app = null;
        Yii::$container = new Container();
    }
}
