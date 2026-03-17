<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class NouisliderAsset extends AssetBundle
{
    public $sourcePath = '@npm/nouislider/dist';
    
    public $css = [
        'nouislider.min.css',
    ];
    
    public $js = [
        'nouislider.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
