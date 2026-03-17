<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class HugerteAsset extends AssetBundle
{
    public $sourcePath = '@npm/hugerte';
    
    public $js = [
        'hugerte.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
