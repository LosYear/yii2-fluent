<?php

namespace yii\fluent\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    /**
     * Access rules for all administration controllers
     * @return array
     */
    public function behaviors()
    {
       return [
         'access' => [
            'class' => AccessControl::className(),
             'rules' => [
                 [
                     'allow' => true,
                     'matchCallback' => function(){
                        return !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin();
                     }
                 ]
             ]
         ]
       ];
    }
}