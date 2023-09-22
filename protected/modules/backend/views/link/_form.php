<?php

use backend\widgets\ActiveForm;
use app\helpers\Constants;

/* @var $this yii\web\View */
/* @var $model app\models\Link */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  <div class="card-body">
    <h4 class="header-title"><?= $this->params['subtitle'] ?></h4>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->widget('backend\widgets\webuploader\Webuploader',['config'=>['fileSingleSizeLimit'=>Yii::$app->config->site_upload_maxsize,'acceptExtensions'=>Yii::$app->config->site_upload_allowext], 'module' => 'link']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->inline()->radioList(Constants::getShowHideItems()) ?>

    <?= $form->field($model, 'sort')->textInput() ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
