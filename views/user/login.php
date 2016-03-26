<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model yii\fluent\models\LoginForm */

$this->title = \Yii::t('fluent/user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
        <b>Admin</b> Panel
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'enableClientValidation'=>false,
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "<div class=\"form-group has-feedback\">{input}\n{error}</div>",
                'options' => ['class' => ''],
            ],
        ]); ?>
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => \Yii::t('fluent/user', 'Password')]) ?>

            <?= $form->field($model, 'rememberMe', [
                'template' => "<div class=\"col-lg-offset-2 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'options' => ['class' => 'form-group']
            ])->checkbox() ?>

            <div class="row">
                <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo \Yii::t('fluent/user', 'Sign in') ?></button>
            </div>
        <?php ActiveForm::end(); ?>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->