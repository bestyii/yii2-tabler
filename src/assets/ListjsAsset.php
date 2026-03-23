<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class ListjsAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/list.js/dist';

    public $js = [
        'list.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
