<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

class TablerMarketingAsset extends BaseAssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [
        'css/tabler-marketing.css',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
