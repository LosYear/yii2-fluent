<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;


/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Menu */

$this->title = Module::t('main', 'Menu item') . " | " . Module::t('main', 'Create') ;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $menu->name, 'url' => ['update', 'id' => $menu->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Menu items');
$this->params['breadcrumbs'][] = Module::t('main', 'Create');

$this->params['title'] = Module::t('main', 'Menu items');
$this->params['subtitle'] = $menu->name;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Menu items'), 'icon' => 'fa fa-list', 'url' => ['items', 'id' => $menu->id]],
];



?>

<?= $this->render('_item_form', [
    'model' => $model,
    'menu' => $menu
]) ?>
