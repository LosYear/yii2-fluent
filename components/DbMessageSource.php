<?php

namespace yii\fluent\components;


use yii\db\Query;
use yii\fluent\models\Message;
use yii\fluent\models\Language;
use yii\i18n\MessageSource;

class DbMessageSource extends MessageSource
{
    public $forceTranslation = true;


    public function translate($category, $message, $language) 
    {
        $translation = (new Query())->from(Message::tableName())->leftJoin(Language::tableName(),'`'.Message::tableName(). '`.`lang_id` = `'.Language::tableName().'`.`id`')
            ->where(['message' => $message, 'category' => $category, Language::tableName().'.lang_id' => $language])->one();

        if ($translation === false){

            $translation = (new Query())->from(Message::tableName())->leftJoin(Language::tableName(),'`'.Message::tableName(). '`.`lang_id` = `'.Language::tableName().'`.`id`')
                ->where(['message' => $message, 'category' => $category, Language::tableName().'.lang_id' => Language::getDefaultCode()])->one();

            if($translation === false){
                return false;
            }

            return $translation['translation'];
        }

        return $translation['translation'];
    }

}