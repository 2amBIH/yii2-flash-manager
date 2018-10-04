<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\NotifyJs;

use dvamigos\Yii2\FlashManager\Flash;
use yii\helpers\Json;
use yii\web\View;
use Yii;

/**
 * NotifyJs widget renders a message from flash component. All flash messages are displayed
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
class NotifyJsFlash extends \yii\base\Widget
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
                $this->view->registerJs("$.notify('{$message}', '{$type}');", View::POS_READY, md5($message));
            }
        }

        parent::run();
    }

    /**
     * Registers required assets and the executing code block with the view
     */
    protected function registerAssets()
    {
        NotifyJsAsset::register($this->getView());

        $js = null;

        if (isset($this->clientOptions)) {
            $clientOptionsJson = Json::encode($this->clientOptions);
            $js = "$.notify.defaults({$clientOptionsJson});";
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
