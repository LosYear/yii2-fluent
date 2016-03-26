<?php
  use yii\fluent\modules\admin\assets\AdminAsset;
  use yii\bootstrap\Html;
  AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>
  <?php $this->beginBody() ?>
  <body class="hold-transition login-page">
    <?php echo $content; ?>
  </body>
  <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>