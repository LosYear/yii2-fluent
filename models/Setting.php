<?php

namespace yii\fluent\models;

use Yii;

/**
 * This is the model class for table "fluent_setting".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @property string $title
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key', 'value', 'title'], 'string', 'max' => 200],
            [['key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('fluent/models', 'ID'),
            'key' => Yii::t('fluent/models', 'Key'),
            'value' => Yii::t('fluent/models', 'Value'),
            'title' => Yii::t('fluent/models', 'Title'),
        ];
    }

    public static function get($key)
    {
        return Setting::findOne(['key' => $key]);
    }
}
