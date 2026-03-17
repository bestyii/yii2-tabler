<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class TypedAsset extends AssetBundle
{
    public $sourcePath = '@npm/typed.js/dist';
    
    public $js = [
        'typed.umd.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
