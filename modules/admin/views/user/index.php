<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\fluent\modules\admin\Module;
/* @var $this yii\web\View */
/* @var $searchModel \yii\fluent\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('main', 'Users');
$this->params['title'] = $this->title;
$this->params['subtitle'] = Module::t('main', 'Manage');

$this->params['actions'] = [
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-body">
    <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'email',
                'created_at',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' =>'{update} {delete}'
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
    </div>
</div>