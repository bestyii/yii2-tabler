<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class AutosizeAsset extends AssetBundle
{
    public $sourcePath = '@bower/autosize/dist';

    public $js = [
        'autosize.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
