<?php

use backend\widgets\ActiveForm;
use app\helpers\Constants;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  
  <ul class="nav nav-tabs page-tabs">
    <li class="nav-item active"><a class="nav-link"><?= $this->params['subtitle'] ?></a></li>
  </ul>
  <div class="card-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parentid')->dropdownList($model::getMenuTree(),['prompt'=>'作为一级菜单']);?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'display')->inline()->radioList(Constants::getYesNoItems()) ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
