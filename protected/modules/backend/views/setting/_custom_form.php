<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modal-header">
    <h4 class="modal-title" id="ajaxModalLabel"><?= $this->title ?></h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
  </div>
  <div class="modal-body ajaxmodal-content">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'fieldlabel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field')->dropDownList(['input'=>'单行文本','textarea'=>'多行文本','radio'=>'单选']) ?>

    <?= $form->field($model, 'value')->textInput() ?>
    
    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
    
  </div>
  


