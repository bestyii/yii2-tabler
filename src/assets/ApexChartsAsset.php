<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace bestyii\tabler\assets;

use grazio\core\web\AssetBundle;

/**
 * ApexChartsAsset
 *
 * @author BestYii
 */
class ApexChartsAsset extends AssetBundle
{
    public $sourcePath = '@npm/apexcharts/dist';
    public $css = [];
    public $js = [
        'apexcharts.min.js',
    ];
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
