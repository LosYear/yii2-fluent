<?php

namespace yii\fluent\controllers;

use Yii;
use yii\fluent\models\Language;
use yii\web\Controller;
use yii\fluent\models\Page;

class PageController extends Controller
{
    public function actionView($id){
        $page = Page::findOne($id)->getTranslation(Language::getCurrentLangID(), false);

        return $this->render('view',['page' => $page]);
    }
}
