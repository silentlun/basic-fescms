<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Admin application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/font-awesome.min.css',
        'static/plugins/toastr/toastr.min.css',
        'static/admin/css/style.css',
        'static/admin/css/dark-layout.min.css',
    ];
    public $js = [
        'static/admin/js/metisMenu.min.js',
        'static/admin/js/simplebar.min.js',
        'static/plugins/sweetalert/sweetalert2.min.js',
        'static/plugins/toastr/toastr.min.js',
        'static/admin/js/app.min.js',
        'static/admin/js/fesadmin.js',
        
        //'//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js',
        'static/plugins/sweetalert/sweetalert-demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
