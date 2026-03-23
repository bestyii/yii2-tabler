<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class ImaskAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/imask/dist';

    public $js = [
        'imask.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
