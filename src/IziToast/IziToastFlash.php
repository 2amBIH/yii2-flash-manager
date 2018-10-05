<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\IziToast;

use dvamigos\Yii2\FlashManager\Flash;
use yii\helpers\Json;
use yii\web\View;
use Yii;

class IziToastFlash extends \yii\base\Widget
{
    public $clientOptions = [];

    public $category = Flash::DEFAULT_CATEGORY;

    const FLASH_SUCCESS = 'success';
    const FLASH_ERROR = 'error';
    const FLASH_INFO = 'info';
    const FLASH_WARNING = 'warning';

    public function run()
    {
        $this->registerAssets();

        foreach (Yii::$app->flash->getAllByCategory($this->category) as $type => $message) {
            if (in_array($type, array_keys(self::getAlertTypes()))) {
                $message = is_array($message) ? current($message) : $message;
                $type = self::getAlertTypes()[$type];
                $this->view->registerJs(";iziToast.{$type}({message: '{$message}'})", View::POS_READY, md5($message));
            }
        }

        parent::run();
    }

    /**
     * Registers required assets and the executing code block with the view
     */
    protected function registerAssets()
    {
        IziToastAsset::register($this->getView());

        $js = null;

        if (isset($this->clientOptions)) {
            $clientOptionsJson = Json::encode($this->clientOptions);
            $js = "iziToast.settings({$clientOptionsJson});";
        }

        if (isset($js)) {
            $this->view->registerJs($js, View::POS_READY, md5($js));
        }
    }

    public static function getAlertTypes()
    {
        return [
            static::FLASH_ERROR   => 'error',
            static::FLASH_SUCCESS => 'success',
            static::FLASH_INFO    => 'info',
            static::FLASH_WARNING => 'warning'
        ];
    }
}
