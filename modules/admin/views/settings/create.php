<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;


/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Block */

$this->title = Module::t('main', 'Key') . " | " . Module::t('main', 'Create') ;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Module::t('main', 'Create');

$this->params['title'] = Module::t('main', 'Key');
$this->params['subtitle'] = Module::t('main', 'Create');

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage (simple)'), 'icon' => 'fa fa-list', 'url' => ['simple']],
    ['label' => Module::t('main', 'Manage (advanced)'), 'icon' => 'fa fa-wrench', 'url' => ['index']],
];



?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
