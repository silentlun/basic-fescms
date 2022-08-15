<?php

use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Configs');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = '基本设置';
?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  <ul class="nav nav-tabs page-tabs">
    <li class="nav-item active"><a class="nav-link" href="#web">网站设置</a></li>
  </ul>
  <?php $form = ActiveForm::begin([
        'id' => 'form-setting',
        'options' => ['class' => 'form-horizontal none-loading'],
      'enableAjaxValidation' => true,
    ]); ?>
  <div class="card-body">
    
      <?= $form->field($model, 'site_title')->textInput() ?>
      <?= $form->field($model, 'site_url')->textInput() ?>
      <?= $form->field($model, 'site_keywords')->textInput() ?>
      <?= $form->field($model, 'site_description')->textInput() ?>
      <?= $form->field($model, 'site_icp')->textInput() ?>
      <?= $form->field($model, 'site_statics_script')->textarea(['rows' => '6']) ?>
      <?= $form->field($model, 'site_status')->inline()->radioList(['1'=>'正常','0'=>'关闭']) ?>
    
    <?= $form->defaultButtons() ?>
  </div>
  <?php ActiveForm::end(); ?>
</div>


