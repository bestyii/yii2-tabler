<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class CountupAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/countup.js/dist';

    public $js = [
        'countUp.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
