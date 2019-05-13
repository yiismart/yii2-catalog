<?php

namespace smart\catalog\backend\assets;

use yii\web\AssetBundle;

class VendorAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/vendor';

    public $js = [
        'vendor.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
