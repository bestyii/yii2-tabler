<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

class TablerExtrasAsset extends BaseAssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [];

    public $js = [];

    public $depends = [
        'bestyii\tabler\assets\TablerFlagsAsset',
        'bestyii\tabler\assets\TablerPaymentsAsset',
        'bestyii\tabler\assets\TablerSocialsAsset',
        'bestyii\tabler\assets\TablerMarketingAsset',
        'bestyii\tabler\assets\TablerThemeAsset',
    ];
}
