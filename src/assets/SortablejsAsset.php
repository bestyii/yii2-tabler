<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class SortablejsAsset extends AssetBundle
{
    public $sourcePath = '@npm/sortablejs';
    
    public $js = [
        'Sortable.min.js',
    ];
    
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
