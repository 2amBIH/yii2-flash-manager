<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\IziToast;

use dvamigos\Yii2\FlashManager\FlashBaseWidget;
use yii\web\View;

/**
 * IziToast widget renders a message from flash component. All flash messages are displayed
 * in the sequence they were assigned using methods from flash component.
 * You can set message as following:
 *
 * ```php
 * Yii::$app->flash->success('This is the message');
 * Yii::$app->flash->error('This is the message');
 * Yii::$app->flash->info('This is the message');
 * Yii::$app->flash->warning('This is the message');
 * ```
 *
 */
class IziToastFlash extends FlashBaseWidget
{
    protected function setJs($type, $message) {
        $this->js .= "iziToast.{$type}({message: '{$message}'});";
    }

    protected function setClientOptionsJs($clientOptionsJson)
    {
        $this->clientOptionsJs = "iziToast.settings({$clientOptionsJson});";
    }

    protected function registerAsset()
    {
        IziToastAsset::register($this->getView());
    }
}
