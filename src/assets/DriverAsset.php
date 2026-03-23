<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class DriverAsset extends AssetBundle
{
    public $sourcePath = '@npm/driver.js/dist';

    public $css = [
        'driver.css',
    ];

    public $js = [
        'driver.js.iife.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
