<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class TablerIconsAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--icons-webfont/dist';
    
    public $css = [
        'tabler-icons.min.css',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
