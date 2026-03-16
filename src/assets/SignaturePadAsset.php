<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class SignaturePadAsset extends AssetBundle
{
    public $sourcePath = '@bower/signature_pad/dist';
    
    public $js = [
        'signature_pad.umd.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
