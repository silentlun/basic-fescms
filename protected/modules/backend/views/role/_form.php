<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */

$model->permissions = $model->permissions ? $model->permissions :[];
?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  <div class="card-body">
    <h4 class="header-title"><?= $this->params['subtitle'] ?></h4>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    
    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>

