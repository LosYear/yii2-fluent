<?php

namespace yii\fluent\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $lang_id
 * @property string $friendly_url
 * @property string $title
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id', 'friendly_url', 'title'], 'required'],
            [['lang_id', 'friendly_url'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 20],
            [['lang_id'], 'unique'],
            [['friendly_url'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('fluent/models', '#'),
            'lang_id' => Yii::t('fluent/models', 'Lang ID'),
            'friendly_url' => Yii::t('fluent/models', 'Friendly Url'),
            'title' => Yii::t('fluent/models', 'Title'),
        ];
    }

    public static function getLangsHash(){
        $result = [];
        foreach(Language::find()->all() as $lang){
            $result[$lang->friendly_id] = $lang->lang_id;
        }

        return $result;
    }

    public static function getDefault(){
        return Language::findOne(['lang_id' => Yii::$app->params['sourceLanguage']]);
    }

    public static function getDefaultID(){
        return Language::findOne(['lang_id' => Yii::$app->params['sourceLanguage']])->id;
    }

    public static function getLangs(){
        return Language::find()->all();
    }

    public static function getCurrentLangID(){
        return Language::find()->where(['lang_id' => Yii::$app->language])->one()->id;
    }
}
