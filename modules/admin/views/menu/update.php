<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Menu */

$this->title = Module::t('main', 'Menu') . " | " . $model->name;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Update');

$this->params['title'] = Module::t('main', 'Menu');
$this->params['subtitle'] = $model->name;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage'), 'icon' => 'fa fa-list', 'url' => ['index']],
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
