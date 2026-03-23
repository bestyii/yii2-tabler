<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class HugerteAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/hugerte';

    public $js = [
        'hugerte.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
