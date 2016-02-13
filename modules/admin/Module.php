<?php

namespace yii\fluent\modules\admin;

use Yii;
/**
 * Fluent backend module definition class
 */
class Module extends \yii\base\Module
{

    public $controllerNamespace = 'yii\fluent\modules\admin\controllers';

    public $layout = 'admin';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Registering translations
        Yii::$app->i18n->translations['fluent::admin*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@fluent/modules/admin/messages',
            'fileMap' => [
                'fluent::admin/main' => 'main.php'
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null){
        return Yii::t('fluent::admin/' . $category, $message, $params, $language);
    }
}
