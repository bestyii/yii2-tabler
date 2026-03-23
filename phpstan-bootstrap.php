<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@bestyii/tabler', __DIR__ . '/src');
Yii::setAlias('@bestyii/tabler/tests', __DIR__ . '/tests');
