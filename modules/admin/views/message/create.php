<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;
use yii\fluent\modules\admin\components\helpers\TranslationsHelper;


/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Block */

$this->title = Module::t('main', 'Translation') . " | " . Module::t('main', 'Create') ;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Interface translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Module::t('main', 'Create');

$this->params['title'] = Module::t('main', 'Translation');
$this->params['subtitle'] = Module::t('main', 'Create');

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage'), 'icon' => 'fa fa-list', 'url' => ['index']]
];

$this->params['translations'] = TranslationsHelper::getCreateItems($model, 'message');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
