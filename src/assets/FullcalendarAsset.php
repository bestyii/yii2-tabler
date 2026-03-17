<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

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
