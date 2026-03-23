<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class AutosizeAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/autosize/dist';

    public $js = [
        'autosize.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
