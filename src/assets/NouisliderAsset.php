<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class NouisliderAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/nouislider/dist';

    public $css = [
        'nouislider.min.css',
    ];

    public $js = [
        'nouislider.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
