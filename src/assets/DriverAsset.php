<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class DriverAsset extends AssetBundle
{
    public $sourcePath = '@npm/driver.js/dist';
    
    public $css = [
        'driver.css',
    ];
    
    public $js = [
        'driver.js.iife.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
