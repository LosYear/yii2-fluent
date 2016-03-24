<?php

namespace yii\fluent\widgets;

use Yii;
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

        $items = MenuItem::find()->where(['root_id' => $root, 'menu_id' => $this->menu->id])->orderBy('order')->all();

        foreach($items as $item){
            $result[] = ['label' => $item->title,  'url' => ($item->link == '')? '#' : $item->link, 'items' => $this->generateTree($item->id)];
        }

        return $result;
    }

    private function loadMenu(){
        $this->menu = \yii\fluent\models\Menu::findOne(['name' => $this->name]);

        $this->items = $this->generateTree();
    }

}