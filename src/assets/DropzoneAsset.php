<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class DropzoneAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/dropzone/dist';

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
