<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\fluent\modules\admin\Module;

/* @var $this yii\web\View */
/* @var $model \yii\fluent\models\MenuItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(!$model->isTranslation()): ?>
        <?= $form->field($model, 'root_id')->dropDownList([-1 => Module::t('main', 'No root')] + $menu->getItemsFlat()) ?>
    <?php else: ?>
        <?php $roots = [-1 => Module::t('main', 'No root')] + $menu->getItemsFlat(); ?>
        <?= $form->field($model, 'root_id')->dropDownList([
            $model->getSource()->root_id => $roots[$model->getSource()->root_id]
        ], ['readonly' => true])?>
    <?php endif; ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => true, 'readonly' => $model->isTranslation(), 'value' => $model->getSource()->order]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('main', 'Create') : Module::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
