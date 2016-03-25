<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Block */

$this->title = Module::t('main', 'Key') . " | " . $model->key;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->key, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Update');

$this->params['title'] = Module::t('main', 'Key');
$this->params['subtitle'] = $model->key;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage (simple)'), 'icon' => 'fa fa-list', 'url' => ['simple']],
    ['label' => Module::t('main', 'Manage (advanced)'), 'icon' => 'fa fa-wrench', 'url' => ['index']],
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
