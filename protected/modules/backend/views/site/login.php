<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use backend\assets\AdminAsset;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

AdminAsset::register($this);

$this->title = '登录-FesAdmin';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>html,body {height: 100%}</style>
    
</head>
<body class="pace-top login-bg">
<?php $this->beginBody() ?>
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<div class="login-cover">
  <div class="login-cover-image"></div>
  <div class="login-cover-bg"></div>
</div>
<div class="d-flex justify-content-center align-items-center h-100" class="fade">
  <div class="login login-v2" data-pageload-addclass="animated fadeIn">
    <div class="login-header">
      <div class="brand"> <span class="logo"></span> FesAdmin <small>快速、高效、安全的WEB管理系统</small> </div>
      <div class="icon"> <i class="fa fa-sign-in"></i> </div>
    </div>
    <div class="login-content">
      <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username')->label(false)->textInput(['class' => 'form-control input-lg form-control-lg', 'placeholder' => '管理账号']) ?>
        <?= $form->field($model, 'password')->label(false)->passwordInput(['class' => 'form-control input-lg form-control-lg', 'placeholder' => '账号密码']) ?>
        <?= $form->field($model, 'verifyCode')->label(false)->widget(Captcha::className(), [
            'captchaAction' => '/site/captcha',
            'template' => '<div class="row"><div class="col-6">{input}</div><div class="col-6">{image}</div></div>',
            'options' => [
                'class' => 'form-control input-lg',
                'placeholder' => Yii::t("app", "Verification Code"),
            ],
                ]) ?>
        
        
        <div class="form-group">
            <?= Html::submitButton('登 录', ['class' => 'btn btn-info btn-block btn-lg', 'name' => 'login-button', 'data-loading-text' => '登录中...']) ?>
        </div>
        <div class="m-t-20"> © <?=date('Y');?> FesAdmin All Rights Reserved. </div>
        
      <?php ActiveForm::end(); ?>
      
    </div>
  </div>
</div>

<?php $this->endBody() ?>
<script>
	
</script>
</body>
</html>
<?php $this->endPage() ?>

