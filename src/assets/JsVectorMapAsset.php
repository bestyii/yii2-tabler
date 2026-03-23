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
class JsVectorMapAsset extends AssetBundle
{
    public $sourcePath = '@npm/tabler--core/dist/libs/jsvectormap/dist';
    public $css = [
        'jsvectormap.min.css',
    ];
    public $js = [
        'jsvectormap.min.js',
        'maps/world.js',
        'maps/world-merc.js',
    ];
    public $depends = [
        'bestyii\tabler\assets\TablerAsset',
    ];
}
