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
        'css/site.css',
//        'css/site2.css',
        // 'css/bootstrap.css',
        // 'css/bootstrap.min.css',
        // 'css/bootstrap-grid.min.css',
        // 'css/bootstrap-reboot.css',
        // 'css/bootstrap-grid.css',
        // 'css/bootstrap-reboot.min.css',
        // 'css/business-frontpage.css',
    ];
    public $js = [
        // 'js/jquery.min.js',
        // 'js/popper.min.js',
        // 'js/bootstrap.bundle.js',
        // 'js/bootstrap.bundle.min.js',
        // 'js/bootstrap.js',
        // 'js/bootstrap.min.js',
        // 'js/jquery.js',
        // 'js/popper.js',
        'js/search_course.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
