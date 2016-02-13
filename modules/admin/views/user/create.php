<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;


/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\User */

$this->title = Module::t('main', 'User') . " | " . Module::t('main', 'Create') ;
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Module::t('main', 'Create');

$this->params['title'] = Module::t('main', 'User');
$this->params['subtitle'] = Module::t('main', 'Create');

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage'), 'icon' => 'fa fa-list', 'url' => ['index']]
];

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
