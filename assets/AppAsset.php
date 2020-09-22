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
        '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic',
        '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic',
        'css/bootstrap.css',
        'css/font-awesome.css',
        'css/flexslider.css',
        'css/creditly.css',
        'css/easy-responsive-tabs.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery.flexslider.js',
        'js/bootstrap.min.js',
        'js/creditly.js',
        'js/counterup.min.js',
        'js/easyResponsiveTabs.js',
        'js/move-top.js',
        'js/easing.js',
        'js/minicart.js',
        'js/okzoom.js',
        'js/main.js',
        'js/cart.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
