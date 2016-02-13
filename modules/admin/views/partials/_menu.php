<?php
use yii\fluent\modules\admin\widgets\Menu;
use yii\fluent\modules\admin\Module;

$items = [
    ['label' => strtoupper(Module::t('main', 'General')), 'options' => ['class' => 'header']],
    ['label' => Module::t('main', 'Users'), 'icon' => 'fa fa-users', 'url' => ['user/index']],
];

if(isset($this->params['actions'])){
    $items[] = ['label' => strtoupper(Module::t('main', 'Actions')), 'options' => ['class' => 'header']];
    $items = array_merge($items, $this->params['actions']);
}
?>

<?= Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'items' => $items
]) ?>