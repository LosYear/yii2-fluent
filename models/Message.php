<?php

namespace yii\fluent\models;

use Yii;
use yii\fluent\components\Translationable;

/**
 * This is the model class for table "fluent_message".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 * @property string $translation
 * @property string $language
 */
class Message extends Translationable
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_message';
    }

    public function immutables()
    {
        return ['message'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'translation'], 'required'],
            [['category'], 'string', 'max' => 35],
            [['message', 'translation'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => Yii::t('fluent/models', 'Category'),
            'message' => Yii::t('fluent/models', 'String'),
            'translation' => Yii::t('fluent/models', 'Translation'),
        ];
    }
}
