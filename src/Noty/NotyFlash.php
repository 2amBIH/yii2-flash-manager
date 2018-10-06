<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\Noty;

use dvamigos\Yii2\FlashManager\Flash;
use dvamigos\Yii2\FlashManager\FlashBaseWidget;
use yii\helpers\Json;
use yii\web\View;
use Yii;;

/**
 * NotyFlash widget renders a message from flash component. All flash messages are displayed
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
class NotyFlash extends FlashBaseWidget
{
    protected function setJs($type, $message) {
        $this->js .= "new Noty({type: '{$type}', text: '{$message}'}).show();";
    }

    protected function setClientOptionsJs($clientOptionsJson)
    {
        $this->clientOptionsJs = "Noty.overrideDefaults({$clientOptionsJson});";
    }

    protected function registerAsset()
    {
        NotyAsset::register($this->getView());
    }
}
