<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\Noty;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Noty css and js files.
 */
class NotyAsset extends AssetBundle
{
    public $sourcePath = '@bower/noty/lib';

    public $css = [
        'noty.css',
    ];

    public $js = [
        'noty.js',
    ];
}