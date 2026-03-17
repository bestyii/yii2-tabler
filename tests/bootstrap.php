<?php

declare(strict_types=1);

error_reporting(-1);

const YII_ENABLE_ERROR_HANDLER = false;
const YII_DEBUG = true;

require_once __DIR__ . '/../../../../vendor/autoload.php';
require_once __DIR__ . '/../../../../vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@bestyii/tabler', dirname(__DIR__) . '/src');
Yii::setAlias('@bestyii/tabler/tests', __DIR__);
