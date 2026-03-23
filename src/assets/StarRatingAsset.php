<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class StarRatingAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/star-rating.js/dist';

    public $css = [
        'star-rating.min.css',
    ];

    public $js = [
        'star-rating.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
