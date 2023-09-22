<?php
use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Configs');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = '附件设置';
?>
<?= $this->render('/widgets/_page-heading') ?>
<div class="card">
  <?php $form = ActiveForm::begin([
        'id' => 'form-setting',
        'options' => ['class' => 'form-horizontal none-loading'],
      'enableAjaxValidation' => true,
    ]); ?>
  <div class="card-body">
    <h4 class="header-title">附件设置</h4>
      <?= $form->field($model, 'site_upload_url')->textInput() ?>
      <?= $form->field($model, 'site_upload_allowext')->textInput() ?>
      <?= $form->field($model, 'site_upload_maxsize',['template'=>"{label}\n<div class=\"col-sm-6\"><div class=\"row\"><div class=\"col-sm-6\">\n{input}\n{error}</div><div class=\"col-sm-6\"><div class=\"form-control-plaintext\">{hint}</div></div></div></div>"])->textInput()->hint('KB') ?>
    
    <?= $form->defaultButtons() ?>
  </div>
  <?php ActiveForm::end(); ?>
</div>


