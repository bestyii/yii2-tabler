<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class FslightboxAsset extends AssetBundle
{
    public $sourcePath = '@npm/fslightbox';
    
    public $js = [
        'index.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
