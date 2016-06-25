<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;
use yii\fluent\modules\admin\components\helpers\TranslationsHelper;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Block */

$this->title = Module::t('main', 'Translation') . " | " . $model->message;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->message, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Update');

$this->params['title'] = Module::t('main', 'Translation');
$this->params['subtitle'] = $model->message;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage'), 'icon' => 'fa fa-list', 'url' => ['index']],
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];

$this->params['translations'] = TranslationsHelper::getUpdateItems($model, 'message')

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
