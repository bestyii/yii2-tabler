<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class ImaskAsset extends AssetBundle
{
    public $sourcePath = '@npm/imask/dist';
    
    public $js = [
        'imask.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
