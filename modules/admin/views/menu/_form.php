<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\fluent\modules\admin\Module;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="block-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('main', 'Create') : Module::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
