<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

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
