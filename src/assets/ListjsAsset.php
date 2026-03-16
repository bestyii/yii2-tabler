<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class ListjsAsset extends AssetBundle
{
    public $sourcePath = '@bower/list.js/dist';
    
    public $js = [
        'list.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
