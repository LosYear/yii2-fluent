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

    public static function getDefaultCode(){
        return Yii::$app->params['sourceLanguage'];
    }

    public static function getDefault(){
        if(!isset(Yii::$app->params['language']['default'])){
            Yii::$app->params['language']['default'] = Language::findOne(['lang_id' => Yii::$app->params['sourceLanguage']]);
        }
        return Yii::$app->params['language']['default'];
    }

    public static function getDefaultID(){
        return Language::getDefault()->id;
    }

    public static function getLangs(){
        return Language::find()->all();
    }

    public static function getCurrentLang(){
        if(!isset(Yii::$app->params['language']['current'])){
            Yii::$app->params['language']['current'] = Language::find()->where(['lang_id' => Yii::$app->language])->one();
        }
        return Yii::$app->params['language']['current'];
    }

    public static function getCurrentLangID(){
        return Language::getCurrentLang()->id;
    }
}
