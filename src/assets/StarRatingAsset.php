<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

/**
 * StarRatingAsset
 */
class StarRatingAsset extends AssetBundle
{
    public $sourcePath = '@bower/star-rating.js/dist';

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
