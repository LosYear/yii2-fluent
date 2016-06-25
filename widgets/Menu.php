<?php

namespace yii\fluent\widgets;

use Yii;
use yii\fluent\models\Language;
use yii\fluent\models\MenuItem;

class Menu extends \yii\widgets\Menu
{

    public $name;

    private $menu;

    public function init(){
        parent::init();
        $this->loadMenu();
    }

    private function generateTree($root = -1){
        $result = [];

        $items = MenuItem::find()->where(['root_id' => $root, 'menu_id' => $this->menu->id, 'source_id' => -1])->orderBy('order')->all();

        foreach($items as $item){
            $item = $item->getTranslation(Language::getCurrentLangID(), false);

            $id = $item->id;
            if($item->source_id != -1){
                $id = $item->source_id;
            }

            $result[] = ['label' => $item->title,  'url' => ($item->link == '')? '#' : $item->link, 'items' => $this->generateTree($id)];
        }

        return $result;
    }

    private function loadMenu(){
        $this->menu = \yii\fluent\models\Menu::findOne(['name' => $this->name]);

        $this->items = $this->generateTree();
    }

}