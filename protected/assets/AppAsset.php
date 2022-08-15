<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/animate.min.css',
        'static/css/font-awesome.min.css',
        'static/css/owl.carousel.css',
        'static/css/style.css',
    ];
    public $js = [
        "static/js/jquery-core-plugins.js",
        "static/js/jquery.validate.min.js",
        "static/plugins/sweetalert/sweetalert.min.js",
        'static/js/app.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
