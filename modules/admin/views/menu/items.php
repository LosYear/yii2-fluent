<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\widgets\Pjax;
use yii\fluent\modules\admin\Module;
/* @var $this yii\web\View */
/* @var $searchModel \yii\fluent\modules\admin\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('main', 'Menu items') . " | " . $menu->name;

$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $menu->name, 'url' => ['update', 'id' => $menu->id]];
$this->params['breadcrumbs'][] = Module::t('main', 'Menu items');

$this->params['title'] = Module::t('main', 'Menu items');
$this->params['subtitle'] = $menu->name;

$this->params['actions'] = [
    ['label' => Module::t('main', 'Menu items'), 'icon' => 'fa fa-list', 'url' => ['items', 'id' => $menu->id]],
    ['label' => Module::t('main', 'Create item'), 'icon' => 'fa fa-pencil', 'url' => ['create-item', 'menu_id' => $menu->id]]
];
?>
<div class="box">
    <div class="box-body">
        <?php echo Menu::widget(['items' => $items, 'encodeLabels' => false, 'options' => ['style' => 'list-style:none']])?>
    </div>
</div>