<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\User */

$this->title = Module::t('main', 'User') . " | " . $model->email;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Update');

$this->params['title'] = Module::t('main', 'User');
$this->params['subtitle'] = $model->email;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage'), 'icon' => 'fa fa-list', 'url' => ['index']],
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

