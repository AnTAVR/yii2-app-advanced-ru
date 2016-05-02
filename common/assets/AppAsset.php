<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * All web-application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@common/assets/assets';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
