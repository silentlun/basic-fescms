<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
$roles = Yii::$app->getAuthManager()->getRoles();
$temp = [];
foreach (array_keys($roles) as $key){
    $temp[$key] = $key;
}
if ($model->id) {
    $model->roles = $model->getRolesNameString();
}

?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  <div class="card-header">
    <h4><?= $subtitle ?></h4>
  </div>
  <div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'username')->staticControl() ?>

    <?= $form->field($model, 'old_password')->passwordInput() ?>
    <?= $form->field($model, 'password')->passwordInput()->label('新密码') ?>
    <?= $form->field($model, 'repassword')->passwordInput() ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>


