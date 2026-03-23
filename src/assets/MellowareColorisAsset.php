<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class MellowareColorisAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/@melloware/coloris/dist';

    public $css = [
        'coloris.min.css',
    ];

    public $js = [
        'umd/coloris.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
