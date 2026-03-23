<?php

declare(strict_types=1);
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

/**
 * @author BestYii
 */
class ApexChartsAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/apexcharts/dist';
    public $css = [];
    public $js = [
        'apexcharts.min.js',
    ];
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
