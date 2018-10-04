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
        'themes/mint.css',
        'themes/bootstrap-v3.css',
        'themes/bootstrap-v4.css',
        'themes/light.css',
        'themes/metroui.css',
        'themes/nest.css',
        'themes/relax.css',
        'themes/semanticui.css',
        'themes/sunset.css',
    ];

    public $js = [
        'noty.js',
    ];
}