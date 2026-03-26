<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

class TablerFlagsAsset extends BaseAssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [
        'css/tabler-flags.css',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
