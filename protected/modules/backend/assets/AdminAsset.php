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
        //'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
        'static/css/font-awesome.min.css',
        'static/admin/plugins/toastr/toastr.min.css',
        'static/admin/css/app.css',
        'static/admin/plugins/sweetalert2.css',
    ];
    public $js = [
        //'static/admin/js/jquery.slimscroll.min.js',
        'static/admin/plugins/layer/layer.js',
        'static/admin/plugins/toastr/toastr.min.js',
        'static/admin/js/fesadmin.js',
        'static/admin/js/app.min.js',
        'static/admin/plugins/sweetalert.min.js',
        '//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js',
        'static/admin/plugins/sweetalert-demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
