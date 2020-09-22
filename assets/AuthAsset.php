<?php


namespace app\assets;


use yii\web\AssetBundle;

class AuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'adminLte/bootstrap/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'adminLte/dist/css/AdminLTE.min.css',
        'adminLte/dist/css/style.css',
        'adminLte/plugins/iCheck/square/blue.css',
    ];
    public $js = [
        'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
        'adminLte/bootstrap/js/bootstrap.min.js',
        'adminLte/plugins/iCheck/icheck.min.js',
        'adminLte/dist/js/auth.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}