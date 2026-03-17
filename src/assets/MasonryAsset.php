<?php

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class MasonryAsset extends AssetBundle
{
    // todo local
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
