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
    <li class="nav-item active"><a class="nav-link" href="#attr">附件设置</a></li>
  </ul>
  <?php $form = ActiveForm::begin([
        'id' => 'form-setting',
        'options' => ['class' => 'form-horizontal none-loading'],
      'enableAjaxValidation' => true,
    ]); ?>
  <div class="card-body">
    
      <?= $form->field($model, 'site_upload_url')->textInput() ?>
      <?= $form->field($model, 'site_upload_allowext')->textInput() ?>
      <?= $form->field($model, 'site_upload_maxsize',['template'=>"{label}\n<div class=\"col-sm-6\"><div class=\"row\"><div class=\"col-sm-6\">\n{input}\n{error}</div><div class=\"col-sm-6 form-control-static\">{hint}</div></div></div>"])->textInput()->hint('KB') ?>
    
    <?= $form->defaultButtons() ?>
  </div>
  <?php ActiveForm::end(); ?>
</div>


