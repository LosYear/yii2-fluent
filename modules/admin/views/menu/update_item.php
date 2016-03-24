<?php

use yii\helpers\Html;
use yii\fluent\modules\admin\Module;


/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Menu */

$this->title = Module::t('main', 'Menu item') . " | " . $model->title;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $menu->name, 'url' => ['update', 'id' => $menu->id]];
$this->params['breadcrumbs'][] = $model->title;
$this->params['breadcrumbs'][] = Module::t('main', 'Update');

$this->params['title'] = $model->title;
$this->params['subtitle'] = Module::t('main', 'Update');

$this->params['actions'] = [
    ['label' => Module::t('main', 'Menu items'), 'icon' => 'fa fa-list', 'url' => ['items', 'id' => $menu->id]],
    ['label' => Module::t('main', 'Create item'), 'icon' => 'fa fa-pencil', 'url' => ['create-item', 'menu_id' => $menu->id]]
];



?>

<?= $this->render('_item_form', [
    'model' => $model,
    'menu' => $menu
]) ?>
