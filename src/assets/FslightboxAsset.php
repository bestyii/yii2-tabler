<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class FslightboxAsset extends AssetBundle
{
    public $sourcePath = '@npm/fslightbox';
    
    public $js = [
        'index.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
