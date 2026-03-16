<?php

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

class SortablejsAsset extends AssetBundle
{
    public $sourcePath = '@npm-asset/sortablejs';
    
    public $js = [
        'Sortable.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
