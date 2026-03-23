<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class TablerIconsAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--icons-webfont/dist';

    public $css = [
        'tabler-icons.min.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
