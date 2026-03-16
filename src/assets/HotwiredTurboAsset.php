<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class HotwiredTurboAsset extends AssetBundle
{
    public $sourcePath = '@npm/hotwired--turbo/dist';
    
    public $js = [
        'turbo.es2017-umd.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
