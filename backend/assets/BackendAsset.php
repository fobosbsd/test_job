<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BackendAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        'bootstrap/dist/js/tether.min.js',
        'bootstrap/dist/js/bootstrap.min.js',
        'plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js',
        'plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js',
        'js/jquery.slimscroll.js',
        'plugins/bower_components/raphael/raphael-min.js',
        'plugins/bower_components/morrisjs/morris.js',
        'plugins/bower_components/waypoints/lib/jquery.waypoints.js',
        'plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js',
        'plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js',
        'plugins/bower_components/toast-master/js/jquery.toast.js',
        'plugins/bower_components/peity/jquery.peity.min.js',
        'plugins/bower_components/peity/jquery.peity.init.js',
        'js/waves.js',
        'js/custom.js',
        'js/dashboard1.js',
        'plugins/bower_components/styleswitcher/jQuery.style.switcher.js',
        'js/main.js'
    ];
    public $depends = [
        'backend\assets\AppAsset',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_END];

}
