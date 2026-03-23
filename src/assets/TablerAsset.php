<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class TablerAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [
        'css/tabler.min.css',
        'css/tabler-vendors.min.css',
    ];

    public $js = [
        'js/tabler.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'bestyii\tabler\assets\TablerIconsAsset',
    ];
}
