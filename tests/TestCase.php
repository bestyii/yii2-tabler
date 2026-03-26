<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use DOMDocument;
use DOMXPath;
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
        // @phpstan-ignore-next-line Yii allows an uninitialized app instance between test cases.
        Yii::$app = null;
        Yii::$container = new Container();
    }

    /**
     * @param array<string, mixed> $config
     */
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

    protected function createHtmlXPath(string $html): DOMXPath
    {
        $previous = libxml_use_internal_errors(true);

        $document = new DOMDocument('1.0', 'UTF-8');
        $document->loadHTML('<?xml encoding="utf-8" ?><body>' . $html . '</body>');

        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        return new DOMXPath($document);
    }

    protected function assertXPathCount(int $expectedCount, string $expression, string $html): void
    {
        $nodes = $this->createHtmlXPath($html)->query($expression);
        self::assertNotFalse($nodes, sprintf('Invalid XPath expression: %s', $expression));
        self::assertCount($expectedCount, $nodes);
    }

    protected function assertXPathExists(string $expression, string $html): void
    {
        $this->assertXPathCount(1, $expression, $html);
    }
}
