<?php

namespace yii\fluent\components;

use yii\web\UrlRuleInterface;
use yii\base\Object;
use yii\fluent\models\Page;

class PagesRule extends Object implements UrlRuleInterface{

    public function createUrl($manager, $route, $params)
    {
        if($route === 'page/view'){
            return $params['id'];
        }
        return false;
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();

        if (preg_match('%^([\-\w]+)?$%', $pathInfo, $matches) && $pathInfo != '') {
            $model = Page::findOne(['slug' => $matches[1]]);

            if($model !== null){
                $_GET['id'] = $model->id;

                return ["fluent/page/view", []];
            }
            return false;
        }
        return false;
    }
}