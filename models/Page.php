<?php

namespace yii\fluent\models;

use Yii;

/**
 * This is the model class for table "fluent_page".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['content'], 'string'],
            [['title', 'slug'], 'string', 'max' => 200],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'title' => Yii::t('fluent/models', 'Title'),
            'slug' => Yii::t('fluent/models', 'Slug'),
            'content' => Yii::t('fluent/models', 'Content'),
        ];
    }
}
