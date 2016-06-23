<?php

namespace yii\fluent\models;

use Yii;
use yii\fluent\components\Translationable;

/**
 * This is the model class for table "fluent_page".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 */
class Page extends Translationable
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_page';
    }

    public function immutables()
    {
        return [
            'slug'
        ];
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
            [['slug'], 'unique', 'when' => function(){return !$this->isTranslation();}],
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
