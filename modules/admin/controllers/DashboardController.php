<?php

namespace yii\fluent\modules\admin\controllers;

use Yii;

class DashboardController extends AdminController
{
    public function actionIndex(){
        return $this->render('index');
    }
}