<?php

namespace yii\fluent\controllers;

use Yii;
use yii\web\Controller;
use yii\fluent\models\Page;

class PageController extends Controller
{
    public function actionView($id){
        $page = Page::findOne($id);

        return $this->render('view',['page' => $page]);
    }
}
