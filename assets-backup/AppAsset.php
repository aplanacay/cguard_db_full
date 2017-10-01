<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

   // public $basePath = '@webroot';
    public $sourcePath = '@themes/full-slider';
  //  public $baseUrl = '@web';
    public $css = [
       'css/site.css',
        'css/material.css',
        'css/half-slider.css',
        'css/one-page-wonder.css',
    ];
    public $js = [
     //   'js/bootstrap.min.js',
        'js/inventory.js',
    //    'js/bootstrap.min.js',
       'js/material.js',
       'js/ripples.js', 
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $publishOptions = [
        'forceCopy' => true,
    ];

}