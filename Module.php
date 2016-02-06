<?php

namespace yii\fluent;

use yii\base\BootstrapInterface;

/**
 * fluent module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();


    }

    /**
     * @param \yii\base\Application $app
     */

    public function bootstrap($app)
    {

    }
}
