<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class SignaturePadAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/signature_pad/dist';

    public $js = [
        'signature_pad.umd.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
