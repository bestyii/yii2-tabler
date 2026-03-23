<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class PlyrAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/plyr/dist';

    public $css = [
        'plyr.css',
    ];

    public $js = [
        'plyr.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
