<?php

namespace yii\fluent\models;

use Yii;
use yii\fluent\models\MenuItem;

/**
 * This is the model class for table "fluent_menu".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fluent_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'title'], 'string', 'max' => 200],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('fluent/models', '#'),
            'name' => Yii::t('fluent/models', 'Name'),
            'title' => Yii::t('fluent/models', 'Title'),
        ];
    }

    public function getItems(){
        return $this->hasMany(MenuItem::className(), ['menu_id' => 'id']);
    }

    public function getItemsFlat($root = -1, $level = 0){
        $result = [];

        $items = MenuItem::find()->where(['root_id' => $root, 'menu_id' => $this->id])->orderBy('order')->all();

        foreach($items as $item){
            $result[$item->id] = str_repeat('-', $level).' '.$item->title;
            $result += $this->getItemsFlat($item->id, $level+1);
        }

        return $result;
    }
}
