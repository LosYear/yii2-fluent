<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\fluent\modules\admin\Module;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel \yii\fluent\modules\admin\models\BlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('main', 'Settings');
$this->params['title'] = $this->title;
$this->params['subtitle'] = Module::t('main', 'Manage');

$this->params['actions'] = [
    ['label' => Module::t('main', 'Manage (advanced)'), 'icon' => 'fa fa-wrench', 'url' => ['index']],
    ['label' => Module::t('main', 'Create'), 'icon' => 'fa fa-pencil', 'url' => ['create']]
];


$this->params['breadcrumbs'][] = $this->title;
?>
<?php foreach($settings as $setting): ?>
    <div class="box">
        <div class="box-body">
            <?php $form = ActiveForm::begin(['action' => \yii\helpers\Url::to(['settings/simple', 'key' => $setting->key])]); ?>

            <?= $form->field($setting, 'value')->textInput(['maxlength' => true])->label($setting->title .' ('.$setting->key.')') ?>


            <div class="form-group">
                <?= Html::submitButton(Module::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php endforeach; ?>