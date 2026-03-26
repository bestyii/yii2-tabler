<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

class TablerSocialsAsset extends BaseAssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [
        'css/tabler-socials.css',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
