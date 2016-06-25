<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;
use yii\fluent\modules\admin\components\helpers\TranslationsHelper;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Page */

$this->title = Module::t('main', 'Page') . " | " . $model->title;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Update');

$this->params['title'] = Module::t('main', 'Page');
$this->params['subtitle'] = $model->title;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage'), 'icon' => 'fa fa-list', 'url' => ['index']],
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];

$this->params['translations'] = TranslationsHelper::getUpdateItems($model, 'page');

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
