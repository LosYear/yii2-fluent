<?php
use yii\fluent\modules\admin\widgets\Menu;
use yii\fluent\modules\admin\Module;

$items = [
    ['label' => strtoupper(Module::t('main', 'General')), 'options' => ['class' => 'header']],
    ['label' => Module::t('main', 'Dashboard'), 'icon' => 'fa  fa-tachometer', 'url' => ['dashboard/index']],
    ['label' => Module::t('main', 'Pages'), 'icon' => 'fa fa-file-text', 'url' => ['page/index']],
    ['label' => Module::t('main', 'Users'), 'icon' => 'fa fa-users', 'url' => ['user/index']],
    ['label' => Module::t('main', 'Blocks'), 'icon' => 'fa fa-th-large', 'url' => ['block/index']],
    ['label' => Module::t('main', 'Menu'), 'icon' => 'fa fa-bars', 'url' => ['menu/index']],
    ['label' => Module::t('main', 'Settings'), 'icon' => 'fa fa-cog', 'url' => ['settings/simple'], 'items' =>[
        ['label' => Module::t('main', 'Settings'), 'icon' => 'fa fa-cog', 'url' => ['settings/simple']],
        ['label' => Module::t('main', 'Interface translations'), 'icon' => 'fa fa-globe', 'url' => ['message/index']],
    ]],
];

if(isset($this->params['actions'])){
    $items[] = ['label' => strtoupper(Module::t('main', 'Actions')), 'options' => ['class' => 'header']];
    $items = array_merge($items, $this->params['actions']);
}

if(isset($this->params['translations'])){
    $items[] = ['label' => strtoupper(Module::t('main', 'Translations')), 'options' => ['class' => 'header']];
    $items = array_merge($items, $this->params['translations']);
}
?>

<?= Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'items' => $items
]) ?>