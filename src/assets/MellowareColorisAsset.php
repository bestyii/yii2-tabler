<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class MellowareColorisAsset extends AssetBundle
{
    public $sourcePath = '@npm/melloware--coloris/dist';
    
    public $css = [
        'coloris.min.css',
    ];
    
    public $js = [
        'coloris.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
