<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\JqueryGrowl;

use dvamigos\Yii2\FlashManager\FlashBaseWidget;

/**
 * JqueryGrowl widget renders a message from flash component. All flash messages are displayed
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
class JqueryGrowlFlash extends FlashBaseWidget
{
    protected function setJs($type, $message) {
        $this->js .= "$.growl.{$type}({title: '{$type}', message: '{$message}'});";
    }

    protected function setClientOptionsJs($clientOptionsJson)
    {
        $this->clientOptionsJs = null;
    }

    protected function registerAsset()
    {
        JqueryGrowlAsset::register($this->getView());
    }

    public static function getAlertTypes()
    {
        return [
            static::FLASH_ERROR   => 'error',
            static::FLASH_SUCCESS => 'notice',
            static::FLASH_INFO    => 'notice',
            static::FLASH_WARNING => 'warning'
        ];
    }
}
