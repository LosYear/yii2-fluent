<?php

namespace yii\fluent\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * Administration panel assets pack
 * @package yii\fluent\modules\admin\assets
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@fluent/modules/admin/assets/files/compiled';

    public $css = [
        'css/adminlte/AdminLTE.css',
        'css/adminlte/skin-green.css'
    ];

    public $js = [
        'js/adminlte.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        'yii\grid\GridViewAsset',
    ];
}