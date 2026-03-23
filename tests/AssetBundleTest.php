<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class AssetBundleTest extends TestCase
{
    public function testAssetBundlesReferencePublishableLocalFiles(): void
    {
        foreach ($this->assetBundleClasses() as $class) {
            /** @var AssetBundle $bundle */
            $bundle = new $class();

            $this->assertNotNull($bundle->sourcePath, sprintf('%s must publish local assets.', $class));

            $sourcePath = Yii::getAlias($bundle->sourcePath, false);
            $this->assertNotFalse($sourcePath, sprintf('%s sourcePath alias is invalid: %s', $class, $bundle->sourcePath));
            $this->assertDirectoryExists($sourcePath, sprintf('%s sourcePath does not exist: %s', $class, $sourcePath));

            foreach ($this->localAssetFiles($bundle) as $assetFile) {
                $this->assertDoesNotMatchRegularExpression(
                    '#^https?://#',
                    $assetFile,
                    sprintf('%s must not rely on a remote asset URL: %s', $class, $assetFile),
                );
                $this->assertFileExists(
                    $sourcePath . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $assetFile),
                    sprintf('%s asset file does not exist: %s', $class, $assetFile),
                );
            }
        }
    }

    public function testAssetBundlesCanBeRegisteredAndPublished(): void
    {
        $view = Yii::$app->getView();
        self::assertInstanceOf(View::class, $view);

        foreach ($this->assetBundleClasses() as $class) {
            /** @var AssetBundle $bundle */
            $bundle = $class::register($view);

            $this->assertNotSame('', (string) $bundle->basePath, sprintf('%s basePath was not published.', $class));
            $this->assertNotSame('', (string) $bundle->baseUrl, sprintf('%s baseUrl was not published.', $class));
        }
    }

    /**
     * @return array<class-string<AssetBundle>>
     */
    private function assetBundleClasses(): array
    {
        $classes = [];

        foreach (glob(dirname(__DIR__) . '/src/assets/*Asset.php') as $file) {
            $classes[] = 'bestyii\\tabler\\assets\\' . basename($file, '.php');
        }

        sort($classes);

        return $classes;
    }

    /**
     * @return string[]
     */
    private function localAssetFiles(AssetBundle $bundle): array
    {
        return array_values(array_filter(
            array_merge($bundle->css, $bundle->js),
            static fn(array|string $file): bool => is_string($file) && $file !== '',
        ));
    }
}
