<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class TypedAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/typed.js/dist';

    public $js = [
        'typed.umd.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
