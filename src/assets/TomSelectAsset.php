<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class TomSelectAsset extends AssetBundle
{
    public $sourcePath = '@npm/tom-select/dist';
    
    public $css = [
        'css/tom-select.bootstrap5.min.css',
    ];
    
    public $js = [
        'js/tom-select.complete.min.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
