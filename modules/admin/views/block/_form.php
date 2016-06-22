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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => $model->isTranslation(), 'value' => $model->getSource()->name]) ?>

    <?php if(!$model->isTranslation()): ?>
        <?= $form->field($model, 'type')->dropDownList($model::types())?>
    <?php else: ?>
        <?= $form->field($model, 'type')->dropDownList([
            $model->getSource()->type => $model::types()[$model->getSource()->type]
        ], ['readonly' => true])?>
    <?php endif; ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('main', 'Create') : Module::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
