<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\Toastr;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Toastr css and js files.
 */
class ToastrAsset extends AssetBundle
{
    public $sourcePath = '@bower/toastr';

    public $css = [
        'toastr.min.css',
    ];

    public $js = [
        'toastr.min.js',
    ];
}