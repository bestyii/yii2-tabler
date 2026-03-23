<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class TomSelectAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/tom-select/dist';

    public $css = [
        'css/tom-select.bootstrap5.min.css',
    ];

    public $js = [
        'js/tom-select.complete.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
