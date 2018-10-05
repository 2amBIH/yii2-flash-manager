<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\IziToast;

use yii\web\AssetBundle;

/**
 * Asset bundle for the IziToast css and js files.
 */
class IziToastAsset extends AssetBundle
{
    public $sourcePath = '@npm/izitoast/dist';

    public $css = [
        'css/iziToast.min.css',
    ];

    public $js = [
        'js/iziToast.min.js',
    ];
}