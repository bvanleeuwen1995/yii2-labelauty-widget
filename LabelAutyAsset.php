<?php

namespace bvanleeuwen1995\labelauty;

use yii\web\AssetBundle;

/**
 * Asset bundle for Label Auty Widget
 *
 * @author Bob van Leeuwen
 * @since 1.0
 */
class LabelAutyAsset extends AssetBundle
{
    // Set the base path
    public $sourcePath = '@vendor/bower/labelauty/source/';
    // Register the CSS files
    public $css = [
        'jquery-labelauty.css',
    ];
    // Register the JS file
    public $js = [
        'jquery-labelauty.js'
    ];
    // Set the dependencies
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
