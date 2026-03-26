<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

class TablerPaymentsAsset extends BaseAssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist';

    public $css = [
        'css/tabler-payments.css',
    ];

    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
