<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class ClipboardAsset extends AssetBundle
{
    public $sourcePath = '@bower/clipboard/dist';
    
    public $js = [
        'clipboard.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
