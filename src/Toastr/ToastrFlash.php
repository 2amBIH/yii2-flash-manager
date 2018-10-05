<?php
/**
 * by Borisa Eric <borisa123@hotmail.com>
 * Company: 2amigOS!
 *
 **/

namespace dvamigos\Yii2\FlashManager\Toastr;

use dvamigos\Yii2\FlashManager\Flash;
use yii\web\View;
use Yii;

/**
 * @author Borisa Eric <borisa123@hotmail.com>
 */
class ToastrFlash extends \yii\base\Widget
{
    /**
     * Plugin options
     * For more information see:
     * @link
     *
     * @var array
     */
    public $clientOptions = [];

    /**
     * Flash category used for different types of flashes.
     *
     * @var string
     */
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
                $this->view->registerJs("toastr.{$type}('{$message}');", View::POS_READY, md5($message));
            }
        }

        parent::run();
    }

    /**
     * Registers required assets and the executing code block with the view
     */
    protected function registerAssets()
    {
        ToastrAsset::register($this->getView());

        $js = null;

        foreach ($this->clientOptions as $option => $value) {
            if (isset($option)) {
                $js .= "toastr.options.{$option} = '{$value}';";
            }
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
