<?php

namespace yii\fluent\widgets;

use Yii;
use yii\base\Widget;
use yii\fluent\models\Language;


class Block extends Widget
{

    public $name;

    private $block;

    public function init(){
        $this->loadBlock();
    }

    public function run()
    {
       return $this->render('block', ['block' => $this->block]);
    }

    private function loadBlock(){
       $this->block = \yii\fluent\models\Block::findOne(['name' => $this->name])->getTranslation(Language::getCurrentLangID(), false);
    }

}