<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\Bootstrap;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Bootstrap css and js files.
 */
class BootstrapAsset extends AssetBundle
{
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}