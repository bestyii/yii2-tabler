<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class TablerAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';
    
    public $css = [
        'css/tabler.min.css',
        'css/tabler-vendors.min.css',
    ];
    
    public $js = [
        'js/tabler.min.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'bestyii\tabler\assets\TablerIconsAsset',
    ];
}
