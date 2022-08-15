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
  <ul class="nav nav-tabs page-tabs">
    <li class="nav-item active"><a class="nav-link"><?= $subtitle ?></a></li>
  </ul>
  <div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'username')->staticControl() ?>

    <?= $form->field($model, 'email')->textInput() ?>
    
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => '不修改密码请留空']) ?>


    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>


