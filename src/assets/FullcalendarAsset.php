<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class FullcalendarAsset extends AssetBundle
{
    public $sourcePath = '@npm/fullcalendar';
    
    public $js = [
        'index.global.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
