<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use Yii;

class BaseAssetBundle extends \yii\web\AssetBundle
{
    /**
     * 获取资源包内特定文件的 Web 访问 URL
     *
     * @param string $filePath 相对 sourcePath 的文件路径
     * @return string
     */
    public function getAssetUrl($filePath)
    {
        return rtrim($this->getPublishedUrl(), '/') . '/' . ltrim($filePath, '/');
    }

    /**
     * 安全获取发布后的 URL 地址
     * @return string
     */
    protected function getPublishedUrl()
    {
        // 优先使用已发布的 baseUrl
        if ($this->baseUrl !== null) {
            return $this->baseUrl;
        }

        if ($this->sourcePath) {
            return Yii::$app->assetManager->getPublishedUrl($this->sourcePath);
        }

        return '';
    }
}
