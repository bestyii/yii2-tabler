<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class FslightboxAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/fslightbox';

    public $js = [
        'index.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
