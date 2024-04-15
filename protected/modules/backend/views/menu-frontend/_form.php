<?php

use backend\widgets\ActiveForm;
use app\helpers\Constants;

/* @var $this yii\web\View */
/* @var $model common\models\MenuFrontend */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  
  <div class="card-body">
  	<h4 class="header-title"><?= $this->params['subtitle'] ?></h4>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->dropdownList($model::getMenuTree(),['prompt'=>'作为一级菜单']);?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'target')->inline()->radioList(['_self' => '当前窗口', '_blank' => '新窗口']) ?>

    <?= $form->field($model, 'display')->inline()->radioList(Constants::getYesNoItems()) ?>

    <?= $form->field($model, 'sort')->textInput() ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
