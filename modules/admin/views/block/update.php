<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;
use yii\fluent\modules\admin\components\helpers\TranslationsHelper;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Block */

$this->title = Module::t('main', 'User') . " | " . $model->name;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Update');

$this->params['title'] = Module::t('main', 'Block');
$this->params['subtitle'] = $model->name;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage'), 'icon' => 'fa fa-list', 'url' => ['index']],
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];

$this->params['translations'] = TranslationsHelper::getUpdateItems($model, 'block')

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
