<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace bestyii\tabler\assets;

use bestyii\tabler\assets\BaseAssetBundle as AssetBundle;

/**
 * JsVectorMapAsset
 *
 * @author BestYii
 */
class JsVectorMapAsset extends AssetBundle
{
    public $sourcePath = '@npm/jsvectormap/dist';
    public $css = [
        'css/jsvectormap.min.css',
    ];
    public $js = [
        'js/jsvectormap.min.js',
        'maps/world.js',
        'maps/world-merc.js',
    ];
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
