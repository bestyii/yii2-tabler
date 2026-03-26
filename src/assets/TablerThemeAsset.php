<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

class TablerThemeAsset extends BaseAssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [
        'css/tabler-themes.css',
    ];

    public $js = [
        'js/tabler-theme.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
