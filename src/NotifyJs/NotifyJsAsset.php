<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\NotifyJs;

use yii\web\AssetBundle;

/**
 * Asset bundle for the NotifyJs css and js files.
 */
class NotifyJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/notifyjs/dist';

    public $js = [
        'notify.js',
    ];
}