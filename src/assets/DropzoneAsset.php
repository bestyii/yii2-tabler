<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class DropzoneAsset extends AssetBundle
{
    public $sourcePath = '@npm/dropzone/dist';
    
    public $css = [
        'dropzone.css',
    ];
    
    public $js = [
        'dropzone-min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
