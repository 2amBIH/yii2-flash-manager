<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\NotifyJs;

use dvamigos\Yii2\FlashManager\Flash;
use dvamigos\Yii2\FlashManager\FlashBaseWidget;
use yii\helpers\Json;
use yii\web\View;
use Yii;

/**
 * NotifyJsFlash widget renders a message from flash component. All flash messages are displayed
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
class NotifyJsFlash extends FlashBaseWidget
{
    protected function setJs($type, $message) {
        $this->js .= "$.notify('{$message}', '{$type}');";
    }

    protected function setClientOptionsJs($clientOptionsJson)
    {
        $this->clientOptionsJs = "$.notify.defaults({$clientOptionsJson});";
    }

    protected function registerAsset()
    {
        NotifyJsAsset::register($this->getView());
    }

    public static function getAlertTypes()
    {
        return [
            static::FLASH_ERROR   => 'error',
            static::FLASH_SUCCESS => 'success',
            static::FLASH_INFO    => 'info',
            static::FLASH_WARNING => 'warn'
        ];
    }
}
