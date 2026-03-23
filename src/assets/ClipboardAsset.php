<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class ClipboardAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/clipboard/dist';

    public $js = [
        'clipboard.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
