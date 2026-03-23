<?php

declare(strict_types=1);

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

class LitepickerAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/litepicker/dist';

    // Tabler 自身通过 css/tabler-vendors.min.css 覆盖了 litepicker 的样式
    // 因此这里可能只需要加载 js 文件
    public $js = [
        'litepicker.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
