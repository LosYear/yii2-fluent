<?php

namespace yii\fluent\models;

use Yii;

/**
 * This is the model class for table "fluent_block".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $title
 * @property string $content
 */
class Block extends \yii\db\ActiveRecord
{

    const TYPE_PLAIN = 'plain';
    const TYPE_HTML = 'html';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'content'], 'required'],
            [['content'], 'string'],
            [['name', 'type', 'title'], 'string', 'max' => 200],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'name' => Yii::t('fluent/models', 'Name'),
            'type' => Yii::t('fluent/models', 'Type'),
            'title' => Yii::t('fluent/models', 'Title'),
            'content' => Yii::t('fluent/models', 'Content'),
        ];
    }

    public static function types(){
        return [
            Block::TYPE_PLAIN => Yii::t('fluent/models', 'Plain text'),
            Block::TYPE_HTML => Yii::t('fluent/models', 'HTML')
        ];
    }

    public function beforeSave($insert)
    {
        if($this->type == Block::TYPE_PLAIN){
            $this->content = strip_tags($this->content, '<br><br/><b><i><u><a><strong><em>');
        }
        return parent::beforeSave($insert);
    }
}
