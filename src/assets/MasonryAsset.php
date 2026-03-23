<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class MasonryAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-masonry/dist';

    public $js = [
        'masonry.pkgd.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
