<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class HotwiredTurboAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/@hotwired/turbo/dist';

    public $js = [
        'turbo.es2017-umd.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
