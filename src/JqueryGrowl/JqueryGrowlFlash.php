<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\JqueryGrowl;

use dvamigos\Yii2\FlashManager\Flash;
use yii\web\View;
use Yii;

class JqueryGrowlFlash extends \yii\base\Widget
{
    public $category = Flash::DEFAULT_CATEGORY;

    const FLASH_SUCCESS = 'success';
    const FLASH_ERROR = 'error';
    const FLASH_INFO = 'info';
    const FLASH_WARNING = 'warning';

    public function run()
    {
        JqueryGrowlAsset::register($this->getView());

        foreach (Yii::$app->flash->getAllByCategory($this->category) as $type => $message) {
            if (in_array($type, array_keys(self::getAlertTypes()))) {
                $message = is_array($message) ? current($message) : $message;
                $type = self::getAlertTypes()[$type];
                $this->view->registerJs("$.growl.{$type}({title: '{$type}', message: '{$message}'});", View::POS_READY, md5($message));
            }
        }

        parent::run();
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
