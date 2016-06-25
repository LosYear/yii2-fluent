<?php

namespace yii\fluent\components;


use yii\fluent\models\Message;
use yii\fluent\models\Language;
use yii\i18n\MessageSource;

class DbMessageSource extends MessageSource
{
    public $forceTranslation = true;


    public function translate($category, $message, $language)
    {
        $lang_id = Language::find()->where(['lang_id' => $language])->one();;

        if($lang_id == null){
            return false;
        }

        $translation = Message::find()->where(['message' => $message, 'lang_id' => $lang_id, 'category' => $category])->one();

        if($translation == null){
            return false;
        }

        return $translation->translation;

    }

}