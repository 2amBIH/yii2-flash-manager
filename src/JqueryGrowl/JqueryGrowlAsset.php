<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\JqueryGrowl;

use yii\web\AssetBundle;

/**
 * Asset bundle for the JqueryGrowl css and js files.
 */
class JqueryGrowlAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-growl';

    public $css = [
        'stylesheets/jquery.growl.css',
    ];

    public $js = [
        'javascripts/jquery.growl.js',
    ];
}