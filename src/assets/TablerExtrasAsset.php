<?php

namespace bestyii\tabler\assets;

class TablerExtrasAsset extends BaseAssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [
        'css/tabler-flags.css',
        'css/tabler-socials.css',
        'css/tabler-payments.css',
        'css/tabler-marketing.css',
        'css/tabler-themes.css',
    ];

    public $js = [
        'js/tabler-theme.min.js',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
