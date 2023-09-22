<?php

use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  <div class="card-body">
    <h4 class="header-title"><?= $this->params['subtitle'] ?></h4>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
