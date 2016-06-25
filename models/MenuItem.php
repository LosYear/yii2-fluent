<?php

namespace yii\fluent\models;

use Yii;
use yii\fluent\components\Translationable;
use yii\fluent\models\Menu;

/**
 * This is the model class for table "fluent_menu_item".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property string $title
 * @property string $link
 */
class MenuItem extends Translationable
{

    public function immutables()
    {
        return [
            'menu_id', 'root_id', 'order'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'title', 'root_id'], 'required'],
            [['menu_id', 'root_id', 'order'], 'integer'],
            [['title', 'link'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('fluent/models', '#'),
            'menu_id' => Yii::t('fluent/models', 'Menu'),
            'title' => Yii::t('fluent/models', 'Title'),
            'link' => Yii::t('fluent/models', 'Link'),
            'order' => Yii::t('fluent/models', 'Order'),
            'root_id' => Yii::t('fluent/models', 'Root item'),
        ];
    }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    public function beforeDelete()
    {
        $items = MenuItem::findAll(['root_id' => $this->id, 'menu_id' => $this->menu_id]);

        foreach($items as $item){
            $item->delete();
        }

        return parent::beforeDelete();
    }
}
