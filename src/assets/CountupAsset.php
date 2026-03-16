<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class CountupAsset extends AssetBundle
{
    public $sourcePath = '@npm/countup.js/dist';
    
    public $js = [
        'countUp.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
