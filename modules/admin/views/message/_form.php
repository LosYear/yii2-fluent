<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\fluent\modules\admin\Module;
use yii\fluent\widgets\CKEditor;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\Block */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="block-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'readonly' => $model->isTranslation(), 'value' => $model->getSource()->category]) ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => true, 'readonly' => $model->isTranslation(), 'value' => $model->getSource()->message]) ?>

    <?= $form->field($model, 'translation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('main', 'Create') : Module::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
